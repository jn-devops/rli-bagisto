<?php

namespace Webkul\BulkUpload\Http\Controllers\Admin;

use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Storage;
use Webkul\BulkUpload\Jobs\ProductUploadJob;
use Webkul\BulkUpload\Imports\DataGridImport;
use Webkul\BulkUpload\Jobs\ProductImageUploadingJob;
use Webkul\BulkUpload\Repositories\ImportProductRepository;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\BulkUpload\Repositories\BulkProductImporterRepository;

class UploadFileController extends Controller
{
    /**
     * @var array
     */
    protected $product = [];

    /**
     * Create a new controller instance.
     */
    public function __construct(
        protected AttributeFamilyRepository $attributeFamilyRepository,
        protected ImportProductRepository $importProductRepository,
        protected BulkProductImporterRepository $bulkProductImporterRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $families = $this->attributeFamilyRepository->all();

        return view('bulkUpload::admin.bulk-upload.upload-files.index', compact('families'));
    }

    /**
     * Download sample files.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadSampleFile()
    {
        if (! empty(request()->download_sample)) {
            return response()->download(public_path('vendor/webkul/admin/assets/sample-files/' . request()->download_sample));
        }

        session()->flash('error', 'Product type is not available, Please select valid product type');

        return redirect()->route('admin.bulk-upload.upload-file.index');
    }

    /**
     * Get profiles on basis of attribute family
     *
     * @return array
     */
    public function getBulkProductImporter()
    {
        $dataFlowProfiles = $this->bulkProductImporterRepository->findByField('attribute_family_id', request()->attribute_family_id);

        return ['dataFlowProfiles' => $dataFlowProfiles];
    }

    /**
     * store import products for profile execution
     *
     * @return \Illuminate\Http\Response
     */
    public function storeProductsFile()
    {
        $request = request();

        $importerId = $request->bulk_product_importer_id;

        $validExtensions = ['csv', 'xls', 'xlsx'];

        $validImageExtensions = ['zip', 'rar'];

        // Validate the request
        $request->validate([
            'file_path'                => 'required',
            'image_path'               => 'mimetypes:application/zip|max:10000',
            'attribute_family_id'      => 'required',
            'bulk_product_importer_id' => 'required',
        ]);

        $importer = $this->bulkProductImporterRepository->find($importerId);

        if (empty($importer)) {
            session()->flash('error', trans('bulkUpload::app.admin.bulk-upload.messages.data-profile-not-selected'));

            return back();
        }

        $product = [
            'attribute_family_id'      => $request->attribute_family_id,
            'bulk_product_importer_id' => $importerId,
            'is_downloadable'          => $request->is_downloadable ? 1 : 0,
            'is_links_have_samples'    => $request->is_link_have_sample ? 1 : 0,
            'is_samples_available'     => $request->is_sample ? 1 : 0,
            'image_path'               => '',
            'file_path'                => '',
            'file_name'                => $request->file('file_path')->getClientOriginalName(),
        ];

        $fileStorePath = 'imported-products/admin';

        // Handle link files
        if ($request->hasFile('link_files')) {
            $linkFiles = $request->file('link_files');

            if (in_array($linkFiles->getClientOriginalExtension(), $validImageExtensions)) {
                $product['upload_link_files'] = $linkFiles->storeAs($fileStorePath . '/link-files', uniqid() . '.' . $linkFiles->getClientOriginalExtension());
            } else {
                session()->flash('error', trans('bulkUpload::app.admin.bulk-upload.messages.file-format-error'));

                return back();
            }
        }

        // Handle link sample files
        if ($request->is_link_have_sample
                    && $request->hasFile('link_sample_files')) {
            $linkSampleFiles = $request->file('link_sample_files');

            if (in_array($linkSampleFiles->getClientOriginalExtension(), $validImageExtensions)) {
                $product['upload_link_sample_files'] = $linkSampleFiles->storeAs($fileStorePath . '/link-sample-files', uniqid() . '.' . $linkSampleFiles->getClientOriginalExtension());
            } else {
                session()->flash('error', trans('bulkUpload::app.admin.bulk-upload.messages.file-format-error'));

                return back();
            }
        }

        // Handle sample files
        if ($request->is_sample
                    && $request->hasFile('sample_file')) {
            $sampleFile = $request->file('sample_file');

            if (in_array($sampleFile->getClientOriginalExtension(), $validImageExtensions)) {
                $product['upload_sample_files'] = $sampleFile->storeAs($fileStorePath . '/sample-file', uniqid() . '.' . $sampleFile->getClientOriginalExtension());
            } else {
                session()->flash('error', trans('bulkUpload::app.admin.bulk-upload.messages.file-format-error'));

                return back();
            }
        }

        // Handle image uploads
        if ($request->hasFile('image_path')) {
            $uploadedImage = request()->file('image_path');

            if (in_array($uploadedImage->getClientOriginalExtension(), $validImageExtensions)) {
                $product['image_path'] = $uploadedImage->storeAs($fileStorePath . '/images', uniqid() . '.' . $uploadedImage->getClientOriginalExtension());
            } else {
                session()->flash('error', trans('bulkUpload::app.admin.bulk-upload.messages.file-format-error'));

                return back();
            }
        }

        // Handle file uploads
        if ($request->hasFile('file_path')) {
            $uploadedFile = request()->file('file_path');

            if (in_array($uploadedFile->getClientOriginalExtension(), $validExtensions)) {
                $product['file_path'] = $uploadedFile->storeAs($fileStorePath . '/files', uniqid() . '.' . $uploadedFile->getClientOriginalExtension());
            } else {
                session()->flash('error', trans('bulkUpload::app.admin.bulk-upload.messages.file-format-error'));

                return back();
            }
        }

        $this->importProductRepository->create($product);

        session()->flash('success', trans('bulkUpload::app.admin.bulk-upload.messages.profile-saved'));

        return back();
    }

    /**
     * Display a run profiler page and get family by attribute family id.
     *
     * @return \Illuminate\View\View
     */
    public function getFamilyAttributesToUploadFile()
    {
        $uniqueAttributeFamilyIds = $this->importProductRepository
            ->distinct()
            ->pluck('attribute_family_id');

        $families = $this->attributeFamilyRepository->whereIn('id', $uniqueAttributeFamilyIds)->get();

        return view('bulkUpload::admin.bulk-upload.run-profile.index', compact('families'));
    }

    /**
     * Get profiles on basis of attribute family
     *
     * @return array
     */
    public function getProductImporter()
    {
        $dataFlowProfiles = $this->bulkProductImporterRepository->findByField('attribute_family_id', request()->attribute_family_id);

        $productImporter = $dataFlowProfiles->filter(function ($dataFlowProfile) {
            return $dataFlowProfile->import_product->isNotEmpty();
        });

        return ['dataFlowProfiles' => $productImporter];
    }

    /**
     * Delete product file from run profiler
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteProductFile()
    {
        try {
            $dataFlowProfile = $this->bulkProductImporterRepository->findOrFail(request()->bulk_product_importer_id);

            $dataFlowProfile->import_product()->where('id', request()->product_file_id)->delete();

            return ['importer_product_file' => $dataFlowProfile->import_product];

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the bulk_product_importer_id does not exist
            return response()->json(['error' => 'Data Flow Profile not found'], 404);
        }
    }

    /**
     * Read CSV file and upload bulk-product using Jobs
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function readCSVData()
    {
        $productFileRecord = $this->importProductRepository->where([
            'bulk_product_importer_id' => request()->bulk_product_importer_id,
            'id'                       => request()->product_file_id,
        ])->first();

        if (! $productFileRecord) {
            return response()->json([
                'error'   => true,
                'message' => 'Selected File not found.',
            ]);
        }

        $csvData = (new DataGridImport())->toArray($productFileRecord->file_path)[0];

        if(count($csvData[0]) > 41) {
            return response()->json([
                'error'   => true,
                'message' => 'Invalid File found. please remove null column value after super_attribute field.',
            ]);
        }

        $csvImageData = (new DataGridImport())->toArray($productFileRecord->file_path)[2] ?? [];

        // Check booking type product is not supported
        if (! empty($csvData)) {
            foreach ($csvData as $data) {
                if ($data['type'] == 'booking') {
                    return response()->json([
                        'success' => false,
                        'message' => trans('bulkUpload::app.admin.bulk-upload.messages.product-not-supported'),
                    ]);
                }
            }
        }

        $countConfig = count(array_filter($csvData, function ($item) {
            return $item['type'] === 'configurable';
        }));

        $countCSV = ($countConfig > 0) ? $countConfig : count($csvData);

        if (! $countCSV) {
            // Handle the case when $countCSV is false (or any condition you need).
            return response()->json([
                'success' => false,
                'message' => 'No CSV Data to Import',
            ]);
        }

        $chunks = array_chunk($csvData, 100);

        $batch = Bus::batch([])->dispatch();

        $batch->add(new ProductUploadJob($productFileRecord, $chunks, $countCSV));
        
        $batch->add(new ProductImageUploadingJob($csvImageData));

        return response()->json([
            'success' => true,
            'message' => 'CSV Product Successfully Imported',
        ]);
    }

    /**
     * Get error after bulk-product uploaded and return error file
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function downloadCsv()
    {
        $folderPath = public_path('storage/error-csv-file');

        // Check if the folder exists
        if (! Storage::exists($folderPath)) {
            // If it doesn't exist, create it
            Storage::makeDirectory($folderPath, 0755, true, true);
        }

        $uploadedFilesError = Storage::allFiles($folderPath);

        $resultArray = collect($uploadedFilesError)
            ->map(function ($file) {
                return [
                    $file->getRelativePath() => [
                        'link'     => asset('storage/error-csv-file/' . $file->getRelativePathname()),
                        'time'     => date('Y-m-d H:i:s', filectime($file)),
                        'fileName' => $file->getFilename(),
                    ],
                ];
            })
            ->groupBy(function ($item) {
                return key($item);
            })
            ->map(function ($group) {
                return $group->map(function ($item) {
                    return $item[key($item)];
                });
            })
            ->toArray();

        $ids = array_keys($resultArray);

        $profilerName = $this->bulkProductImporterRepository
            ->get()
            ->whereIn('id', $ids)
            ->pluck('name')
            ->all();

        return response()->json([
            'resultArray'   => $resultArray,
            'profilerNames' => array_combine($ids, $profilerName),
        ]);
    }

    /**
     * Delete CSV file from run profiler page
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCSV()
    {
        $fileToDelete = 'error-csv-file/' . request('id') . '/' . request('name');

        if (Storage::delete($fileToDelete)) {
            return response()->json(['message' => 'File deleted successfully']);
        }

        return response()->json(['message' => 'File not found'], 404);
    }

    /**
     * Get Uploaded and not uploaded product detail from session
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUploadedProductOrNotUploadedProduct()
    {
        $data = [];
        $status = request()->status;
        $message = false;

        if (session()->has('notUploadedProduct')) {
            $data['notUploadedProduct'] = session()->get('notUploadedProduct');
        }

        if (session()->has('uploadedProduct')) {
            $data['uploadedProduct'] = session()->get('uploadedProduct');
        }

        if (session()->has('completionMessage')) {
            $message = true;
            $data['completionMessage'] = session()->get('completionMessage');
            $status = false;
        }

        return response()->json(['response' => $data, 'status' => $status, 'success' => $message], 200);
    }
}
