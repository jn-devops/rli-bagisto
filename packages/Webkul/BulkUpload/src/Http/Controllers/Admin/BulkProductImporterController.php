<?php

namespace Webkul\BulkUpload\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\BulkUpload\Repositories\BulkProductImporterRepository;
use Webkul\BulkUpload\DataGrids\Admin\BulkProductImporterDataGrid;

class BulkProductImporterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Attribute\Repositories\AttributeFamilyRepository  $attributeFamilyRepository
     * @param  \Webkul\BulkUpload\Repositories\BulkProductImporterRepository  $bulkProductImporterRepository
     *
     * @return void
     */
    public function __construct(
        protected AttributeFamilyRepository $attributeFamilyRepository,
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
        if (request()->ajax()) {
            return app(BulkProductImporterDataGrid::class)->toJson();
        }

        $families = $this->attributeFamilyRepository->all();

        return view('bulkupload::admin.bulk-upload.bulk-product-importer.index', compact('families'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'name'                => 'required|unique:bulk_product_importers',
            'attribute_family_id' => 'required',
            'locale_code'         => 'required',
        ]);

        try {
            $this->bulkProductImporterRepository->create(request()->all());

        } catch (\Exception $e) {
        }

        return new JsonResponse([
            'message' => trans('bulkupload::app.admin.bulk-upload.messages.profile-saved'),
            'status'  => true,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * Depricate function
     * 
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $families = $this->attributeFamilyRepository->all();

        $profiles = $this->bulkProductImporterRepository->findOrFail($id);

        return view('bulkupload::admin.bulk-upload.bulk-product-importer.edit', compact('families', 'profiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $id = request()->input('id');
        
        $this->validate(request(), [
            'name'                => ['required', 'unique:bulk_product_importers,name,' . $id],
            'attribute_family_id' => 'required',
        ]);

        $data = [
            'id'                  => request()->id,
            'name'                => request()->name,
            'attribute_family_id' => is_numeric(request()->attribute_family_id) ? request()->attribute_family_id : request()->family_id,
            'locale_code'         => request()->locale_code,
            '_method'             => request()->_method,
        ];

        try {
            $this->bulkProductImporterRepository->update($data, $id);

        } catch (\Exception $e) {
        }

        return new JsonResponse([
            'message' => trans('bulkupload::app.admin.bulk-upload.messages.update-profile'),
            'status'  => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->bulkProductImporterRepository->findOrFail($id)->delete();

        } catch (\Exception $e) {
        }

        return new JsonResponse([
            'message' => trans('bulkupload::app.admin.bulk-upload.messages.profile-deleted')
        ]);
    }

    /**
     * Mass Delete the dataflowprofiles
     *
     * @return \Illuminate\Http\Response
     */
    public function massDestroy()
    {   
        try {
            $this->bulkProductImporterRepository->whereIn('id', request()->input('indices'))->delete();

        } catch (\Exception $e) {
        }

        return new JsonResponse([
            'message' => trans('bulkupload::app.admin.bulk-upload.messages.all-profile-deleted'),
        ]);
    }

    /**
     * Get Attribute family byiImporter id
     *
     * @return \Illuminate\Http\Response
     */
    public function getAttributeFamilyByImporterId()
    {
        $profiles = $this->bulkProductImporterRepository->findOrFail(request()->id);
        
        $family = $this->attributeFamilyRepository->find($profiles['attribute_family_id']);
        
        return new JsonResponse([
            'family' => $family,
        ]);
    }
}
