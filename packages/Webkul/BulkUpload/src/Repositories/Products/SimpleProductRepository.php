<?php

namespace Webkul\BulkUpload\Repositories\Products;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\{Event, Validator};
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Core\Eloquent\Repository as BaseRepository;
use Webkul\Inventory\Repositories\InventorySourceRepository;
use Webkul\BulkUpload\Repositories\Products\HelperRepository;
use Webkul\BulkUpload\Repositories\{ImportProductRepository, ProductImageRepository};
use Webkul\Attribute\Repositories\{AttributeFamilyRepository, AttributeOptionRepository};
use Webkul\Product\Repositories\{ProductCustomerGroupPriceRepository, ProductRepository};

class SimpleProductRepository extends BaseRepository
{
    /**
     * Pre-defind Array for Array
     */
    protected $errors = [];

    /**
     * Array for error
     */
    protected $dataNotInserted = [];

    /**
     * Create a new repository instance.
     *
     * @param  \Webkul\Attribute\Repositories\AttributeRepository  $attributeRepository
     * @param  \Webkul\Attribute\Repositories\AttributeFamilyRepository  $attributeFamilyRepository
     * @param  \Webkul\Attribute\Repositories\AttributeOptionRepository  $attributeOptionRepository
     * @param  \Webkul\Category\Repositories\CategoryRepository  $categoryRepository
     * @param  \Webkul\Product\Repositories\ProductRepository  $productRepository
     * @param  \Webkul\Inventory\Repositories\InventorySourceRepository  $inventorySourceRepository
     * @param  \Webkul\BulkUpload\Repositories\ImportProductRepository  $importProductRepository
     * @param  \Webkul\BulkUpload\Repositories\ProductImageRepository  $productImageRepository
     * @param  \Webkul\BulkUpload\Repositories\Products\HelperRepository  $helperRepository
     *
     * @return void
     */
    public function __construct(
        protected AttributeRepository $attributeRepository,
        protected AttributeFamilyRepository $attributeFamilyRepository,
        protected AttributeOptionRepository $attributeOptionRepository,
        protected CategoryRepository $categoryRepository,
        protected ProductRepository $productRepository,
        protected InventorySourceRepository $inventorySourceRepository,
        protected ImportProductRepository $importProductRepository,
        protected ProductImageRepository $productImageRepository,
        protected HelperRepository $helperRepository,
    ) {
    }

    /*
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'Webkul\Product\Contracts\Product';
    }

    /**
     * create & update simple-type product
     *
     * @param array $dataFlowProfileRecord
     * @param array $csvData
     * @param int $key
     *
     * @return mixed
     */
    public function createProduct($dataFlowProfileRecord, $csvData, $key)
    {
        //Validation
        $createValidation = $this->helperRepository->createProductValidation($csvData, $key);
       
        if (isset($createValidation)) {
            return $createValidation;
        }

        //processing inventory sources
        $inventory_sources = collect(explode(',', $csvData['inventory_sources']))->map( function($inventory_sources) {
            return trim($inventory_sources);
        });
        
        $csvData['inventories'] = $this->inventorySourceRepository->findWhereIn('code', $inventory_sources->toArray())->pluck('id')->toArray();
        
        $csvData['weight'] = 1;

        $createProduct = [
            'sku'                 => $csvData['sku'],
            'type'                => $csvData['type'],
            'attribute_family_id' => $dataFlowProfileRecord->profiler->attribute_family_id,
        ];
       
        if (trim($csvData['type']) == 'variant') {
            $csvData['parent_id'] = $this->productRepository->findOneByField('sku', $csvData['parent'])->id;

            $superAttributes['super_attributes'] = $csvData['super_attributes'];
            
            if (! isset($superAttributes['super_attributes']) 
                    || empty($superAttributes['super_attributes'])) {
                return [
                    'error' => [trans('admin::app.catalog.products.configurable-error')],
                ];
            }

            $productSuperAttributes = [];
           
            foreach (explode(',', $superAttributes['super_attributes']) as $super_attributes) {
        
                $super_attributes = trim($super_attributes);

                $attributeOption = $this->attributeOptionRepository->findOneByField([
                                        'admin_name'   => $csvData[$super_attributes],
                                        'attribute_id' => $this->attributeRepository->findOneByField('code', $super_attributes)->id,
                                    ]);

                $productSuperAttributes[$super_attributes][] = $attributeOption->id ?? null;
            }

            $csvData['super_attributes'] = $productSuperAttributes;
        }
        
        // Check for Duplicate SKU
        $product = $this->productRepository->firstWhere('sku', $csvData['sku']);

        // Create Product
        if (! $product) {
            Event::dispatch('catalog.product.create.before');

            $product = $this->productRepository->create($createProduct);

            Event::dispatch('catalog.product.create.after', $product);
            
            // Product Update Procesing
            $this->updateProduct($csvData, $product, $dataFlowProfileRecord);
        }else {
            // Product Update Procesing
            $this->updateProduct($csvData, $product, $dataFlowProfileRecord);
        }
    }

    /**
     * Process product update and return data array
     *
     * @param array $csvData
     * @param mixed $product
     * @param array $dataFlowProfileRecord
     * @return array $data
     */
    private function updateProduct($csvData, $product, $dataFlowProfileRecord)
    {
        // store uploaded product in session
        if (! empty($product)) {
            $uploadedProduct = [
                'id'   => $product->id,
                'sku'  => $product->sku,
                'type' => $product->type,
            ];

            session()->push('uploadedProduct', $uploadedProduct);
        }
        
        // Process product attributes
        $data = $this->processProductAttributes($csvData, $product);

        // Process inventory for configurable product
        if (in_array($product->type, ["variant", "configurable"])) {
            $this->processProductInventoryForConfiguration($csvData, $data);
        } else {
            $this->processProductInventory($csvData, $data);
        }

        // Process categories
        $categories = $this->processProductCategories($csvData);
       
        if (isset($categories[0]['error'])) {
            $this->helperRepository->deleteProductIfNotValidated($product->id);

            return $categories[0];
        }
        
        $data['categories'] = $categories;

        $data['locale'] = $dataFlowProfileRecord->profiler->locale_code;

        $data['channel'] = core()->getCurrentChannel()->code;

        $data['type'] = $csvData['type'] ?? 0;

        $data['parent_id'] = $csvData['parent_id'] ?? null;

        $data['super_attributes'] = $csvData['super_attributes'] ?? [];

        $data['weight'] = 1;

        // Process customer group pricing
        $this->processCustomerGroupPricing($csvData, $data, $product);

        // Process product images
        $data['images'] = $this->processProductImages($csvData);
        
        if ($product->type == 'downloadable' 
                && isset($csvData['link_titles'])) {
            $downloadableLinks = $this->addLinksAndSamples($csvData, $dataFlowProfileRecord, $product);

            if (isset($downloadableLinks['error'])) {
                $this->helperRepository->deleteProductIfNotValidated($product->id);

                return $downloadableLinks;
            }

            $data['downloadable_links'] = $downloadableLinks;
        }
  
        if ($product->type == 'downloadable' 
                    && isset($csvData['samples_title'])) {
            $downloadableSamples = $this->addSamples($csvData, $dataFlowProfileRecord, $product);
            
            if (isset($downloadableSamples['error'])) {
                $this->helperRepository->deleteProductIfNotValidated($product->id);

                return $downloadableSamples;
            }

            $data['downloadable_samples'] = $downloadableSamples;
        }

        //prepare bundle options
        if (isset($csvData['bundle_options'])) {
            $bundleOptions = json_decode($csvData['bundle_options'], true);

            $data['bundle_options'] = $bundleOptions;
        }

        // //grouped product links
        if (isset($csvData['grouped_options'])) {
            $groupedOptions = json_decode($csvData['grouped_options'], true);

            $data['links'] = $groupedOptions;
        }
        
        // Validate product data and handle errors
        $validationErrors = $this->validateProductData($data, $product);
        
        if ($validationErrors) {
            $this->helperRepository->deleteProductIfNotValidated($product->id);

            return $validationErrors;
        }

        Event::dispatch('catalog.product.update.before',  $product->id);

        $productFlat = $this->productRepository->update($data, $product->id);
       
        Event::dispatch('catalog.product.update.after', $productFlat);
        
        // Upload images
        if ($productFlat) {
            $this->productImageRepository->bulkuploadImages($data, $productFlat);
        }
    }

    /**
     * Process product attributes and return data array
     *
     * @param array $csvData
     * @param mixed $product
     * @return array $data
     */
    private function processProductAttributes($csvData, $product)
    {
        $data = [];
        $attributeCode = [];
        $attributeValue = [];
        $attributes = $product->getTypeInstance()->getEditableAttributes();
       
        foreach ($attributes as $attribute) {
            $searchIndex = strtolower($attribute['code']);
            
            $csvValue = $csvData[$searchIndex] ?? null;

            if (is_null($csvData)) {
                continue;
            }
            
            $attributeCode[] = $searchIndex;
           
            switch ($attribute['type']) {
                case "select":
                    $attributeOption = $this->attributeOptionRepository->findOneByField(['attribute_id' => $attribute['id'],'admin_name' => $csvValue]);

                    $attributeValue[] = ($attributeOption !== null) ? $attributeOption['id'] : null;

                    break;
                case "checkbox":
                    $attributeOption = $this->attributeOptionRepository->findOneByField(['attribute_id' => $attribute['id'], 'admin_name' => $csvValue]);

                    $attributeValue[] = ($attributeOption !== null) ? $attributeOption['id'] : null;

                    break;
                case in_array($searchIndex, ["color", "size", "brand"]):
                    $attributeOption = $this->attributeOptionRepository->findOneByField(['admin_name' => ucwords($csvValue)]);

                    $attributeValue[] = ($attributeOption !== null) ? $attributeOption['id'] : null;

                    break;
                default:
                    if ($searchIndex == 'url_key') {
                        $csvValue = strtolower($csvValue);
                    }

                    $attributeValue[] = $csvValue;
                    break;
            }

            $data = array_combine($attributeCode, $attributeValue);
        }

        return $data;
    }

    /**
     * Process product inventory for Configuration data and update $data array
     *
     * @param array $csvData
     * @param array $data
     * @return int $data
     */
    private function processProductInventoryForConfiguration($csvData, &$data)
    {
        $inventoryCode = preg_split('/,\s*|,/', $csvData['inventory_sources']);
    
        $inventoryId = $this->inventorySourceRepository->whereIn('code', $inventoryCode)->pluck('id')->toArray();
        
        $inventoryData = preg_split('/,\s*|,/', $csvData['manage_stock']);

        if (count($inventoryId) != count($inventoryData)) {
            $inventoryData = array_fill(0, count($inventoryId), 0);
        }
        
        $data['inventories'] = array_combine($inventoryId, $inventoryData);
      
        $data['price'] = $csvData['price'];
    }

    /**
     * Process product inventory data and update $data array
     *
     * @param array $csvData
     * @param array $data
     * @return int $data
     */
    private function processProductInventory($csvData, &$data)
    {
        $inventoryCode = preg_split('/,\s*|,/', $csvData['inventory_sources']);
        
        $inventoryId = $this->inventorySourceRepository->whereIn('code', $inventoryCode)->pluck('id')->toArray();
      
        $inventoryData = preg_split('/,\s*|,/', $csvData['manage_stock']);

        if (count($inventoryId) != count($inventoryData)) {
            $inventoryData = array_fill(0, count($inventoryId), 0);
        }

        $data['inventories'] =  array_combine($inventoryId, $inventoryData);
    }

    /**
     * Process product categories and update $data array
     *
     * @param array $csvData
     * @return int $categoryID
     */
    private function processProductCategories($csvData)
    {
        if (is_null($csvData['category']) 
                || empty($csvData['category'])) {

            $categoryID = $this->categoryRepository->findBySlugOrFail('root')->id;

        } else {
            $categoryData = preg_split('/,\s*|,/', $csvData['category']);

            $categoryID = array_map(function ($value) {
                try {
                    return $this->categoryRepository->findBySlugOrFail(Str::slug(strtolower($value)))->id;
                } catch(\Exception $e) {
                    return [
                        'error' => ['category not found', $e->getMessage()],
                    ];
                }
            }, $categoryData);
        }

        return $categoryID;
    }

    /**
     * Process customer group pricing and update $data array
     *
     * @param array $csvData
     * @param array $product
     * @return mixed
     */
    private function processCustomerGroupPricing($csvData, &$data, $product)
    {
        if (isset($csvData['customer_group_prices']) 
                && ! empty($csvData['customer_group_prices'])) {

            $data['customer_group_prices'] = json_decode($csvData['customer_group_prices'], true);
            
            app(ProductCustomerGroupPriceRepository::class)->saveCustomerGroupPrices($data, $product);
        }
    }

    /**
     * Process product images and update $csvData array
     *
     * @param string|array $csvData
     * @return mixed
     */
    private function processProductImages($csvData)
    {
        $productImages = [];

        $imagePath = 'public/imported-products/admin/images/' . $csvData['sku'];

        $images = Storage::disk('local')->files($imagePath);

        foreach ($images as $imageArraykey => $imagePath) {
            $productImages[$imageArraykey] = $imagePath;
        }

        return $productImages;
    }

    /**
     * Validate product data and handle errors 
     *
     * @param string|array $data
     * @param string|array $product
     * @return string
     */
    private function validateProductData($data, $product)
    {
        return false;

        $returnRules = $this->helperRepository->validateCSV($product);

        $csvValidator = Validator::make($data, $returnRules);

        if ($csvValidator->fails()) {
            $errors = $csvValidator->errors()->getMessages();

            $errorToBeReturn = [];

            foreach ($errors as $error) {
                if ($error[0] == "The url key has already been taken.") {
                    $errorToBeReturn[] = "The url key " . $data['url_key'] . " has already been taken";
                } else {
                    $errorToBeReturn[] = str_replace(".", "", $error[0]) . " for sku " . $data['sku'];
                }
            }

            return [
                'error' => $errorToBeReturn,
            ];
        }

        return null; // No validation errors
    }

    /**
     * add link and sample file and return error 
     *
     * @param string|array $csvData
     * @param array $dataFlowProfileRecord
     * @param string|array $product
     * @return mixed
     */
    public function addLinksAndSamples($csvData, $dataFlowProfileRecord, $product)
    {
        $downloadableLinks = $this->extractDownloadableFiles($dataFlowProfileRecord);

        // Initialize arrays to store downloadable links
        $linkNameKey = [];

        $d_links = [];

        $linkDataKeys = [
            'link_titles',
            'link_prices',
            'link_types',
            'link_url',
            'link_file_names',
            'link_downloads',
            'link_sort_orders',
            'link_sample_types',
            'link_sample_url',
            'link_sample_file_names',
        ];

        $linkData = [];

        foreach ($linkDataKeys as $key) {
            $linkData[$key] = preg_split('/,\s*|,/', $csvData[$key]);
        }

        // Ensure that all link data arrays have the same length
        $dataLengths = array_map('count', $linkData);
        $uniqueLengths = array_unique($dataLengths);

        if (! (count($uniqueLengths) === 1)) {
            return [
                'error' => ["Please provide correct value for Lnik, Sample Link realted field for sku: {$product->sku}"],
            ];
        }

        $dataLength = reset($uniqueLengths);

        // Loop through the downloadable links data
        for ($index = 0; $index < $dataLength; $index++) {
            $linkTitle = $linkData['link_titles'][$index];
            $linkType = trim(strtolower($linkData['link_types'][$index]));
            $linkSampleType = trim(strtolower($linkData['link_sample_types'][$index]));

            // Determine the file link or URL for the link
            $fileLink = $this->linkFileOrUrlUpload(
                $dataFlowProfileRecord,
                $linkType,
                ($linkType == "url") ? $linkData['link_url'][$index] : $linkData['link_file_names'][$index],
                $product->id,
                $downloadableLinks
            );

            // Determine the sample file or URL for the link
            $sampleFileLink = $this->fileOrUrlUpload(
                $dataFlowProfileRecord,
                $linkSampleType,
                ($linkSampleType == "url") ? $linkData['link_sample_url'][$index] : $linkData['link_sample_file_names'][$index],
                $product->id,
                $downloadableLinks,
                false
            );

            // Create the downloadable link array
            $link['link_' . $index] = [
                core()->getCurrentLocale()->code => [
                    "title" => $linkTitle,
                ],
                "price"                          => isset($linkData['link_prices'][$index]) ? $linkData['link_prices'][$index] : "",
                "type"                           => trim($linkData['link_types'][$index]),
                "sample_type"                    => trim($linkData['link_sample_types'][$index]),
                "downloads"                      => isset($linkData['link_downloads'][$index]) ? $linkData['link_downloads'][$index] : 0,
                "sort_order"                     => isset($linkData['link_sort_orders'][$index]) ? $linkData['link_sort_orders'][$index] : 0,
            ];

            if (trim($linkData['link_types'][$index]) == "url") {

                $link['link_' . $index]['url'] = trim($fileLink);

            } elseif (trim($linkData['link_types'][$index]) == "file" 
                    && isset($fileLink)) {
                $link['link_' . $index]['file'] = trim($fileLink);

                $link['link_' . $index]['file_name'] = trim($linkData['link_file_names'][$index]);
            }

            if (trim($linkData['link_sample_types'][$index]) == "url") {

                $link['link_' . $index]['sample_url'] = trim($linkData['link_sample_url'][$index]);

            } elseif (trim($linkData['link_sample_types'][$index]) == "file" 
                    && isset($sampleFileLink)) {
                $link['link_' . $index]['sample_file'] = trim($sampleFileLink);

                $link['link_' . $index]['sample_file_name'] = trim($linkData['link_sample_file_names'][$index]);
            }

            array_push($linkNameKey, 'link_' . $index);

            array_push($d_links, $link['link_' . $index]);
        }

        $combinedLinksArray = array_combine($linkNameKey, $d_links);

        return $combinedLinksArray;
    }

    /**
     * add sample file and return error 
     *
     * @param string|array $csvData
     * @param array $dataFlowProfileRecord
     * @param string|array $product
     * @return mixed
     */
    public function addSamples($csvData, $dataFlowProfileRecord, $product)
    {
        $downloadableLinks = $this->extractDownloadableFiles($dataFlowProfileRecord);

        $d_samples = [];

        $sampleNameKey = [];

        $sampleDataKeys = [
            'samples_title',
            'sample_type',
            'sample_files',
            'sample_url',
            'sample_sort_order',
        ];

        $sampleData = [];

        foreach ($sampleDataKeys as $key) {
            $sampleData[$key] = preg_split('/,\s*|,/', $csvData[$key]);
        }

        // Ensure that all link data arrays have the same length
        $dataLengths = array_map('count', $sampleData);

        $uniqueLengths = array_unique($dataLengths);

        if (! (count($uniqueLengths) === 1)) {
            return [
                'error' => ["Please provide correct value for Sample realted field for sku: {$product->sku}"],
            ];
        }

        $dataLength = reset($uniqueLengths);

        // Loop through the downloadable sample data
        for ($index = 0; $index < $dataLength; $index++) {
            $sampleTitle = $sampleData['samples_title'][$index];

            $sampleFileType = trim(strtolower($sampleData['sample_type'][$index]));

            $sampleFileName = $sampleData['sample_files'][$index];

            $sampleUrl = $sampleData['sample_url'][$index];

            $sampleSortOrder = $sampleData['sample_sort_order'][$index];

            // Determine the sample file or URL for the link
            $sampleFileLink = $this->fileOrUrlUpload(
                $dataFlowProfileRecord,
                $sampleFileType,
                ($sampleFileType == "url") ? $sampleUrl : $sampleFileName,
                $product->id,
                $downloadableLinks,
                false
            );
            
            // Create the downloadable sample array
            $sample['sample_' . $index] = [
                core()->getCurrentLocale()->code => [
                    "title" => $sampleTitle,
                ],
                "type"                           => trim($sampleFileType),
                "sort_order"                     => $sampleSortOrder[$index] ?? 0,
            ];

            if (trim($sampleFileType) == "url") {

                $sample['sample_' . $index]['url'] = trim($sampleUrl);

            } elseif (trim($sampleFileType) == "file" 
                    && isset($sampleFileLink)) {
                $sample['sample_' . $index]['file'] = trim($sampleFileLink);

                $sample['sample_' . $index]['file_name'] = trim($sampleFileName);
            }

            array_push($sampleNameKey, 'sample_' . $index);

            array_push($d_samples, $sample['sample_' . $index]);
        }

        $combinedArray = array_combine($sampleNameKey, $d_samples);

        return $combinedArray;
    }

    /**
     * upload sample file link or url
     *
     * @param \Webkul\BulkUpload\Contracts\ImportProduct $dataFlowProfileRecord
     * @param string $type
     * @param string|array $file
     * @param integer $id
     * @param array $downloadableLinks
     * @param string $flag
     *
     * @return mixed
     */
    public function fileOrUrlUpload($dataFlowProfileRecord, $type, $file, $id, $downloadableLinks, $flag)
    {
        try {
            if (trim($type) == "file") {
                // Determine the file path
                $sourcePath = $flag ? "imported-products/extracted-images/admin/sample-files/" : "imported-products/extracted-images/admin/link-sample-files/";

                // 'upload_link_files', 'upload_sample_files', 'upload_link_sample_files'
                $sourcePath .= $dataFlowProfileRecord->id.'/'.$downloadableLinks['upload_'.($flag ? 'sample' : 'link_sample').'_filesZipName']['dirname'].'/'.trim(basename($file));

                $destination = "product/".$id.'/'.trim(basename($file));

                // Copy the file to the destination
                Storage::copy($sourcePath, $destination);

                return $destination;
            } else {
                // Handle URL upload
                $imagePath = storage_path('app/public/imported-products/extracted-images/admin/'.($flag ? 'sample-files' : 'link-sample-files').'/'.$dataFlowProfileRecord->id);

                if (!file_exists($imagePath)) {
                    mkdir($imagePath, 0777, true);
                }

                $imageFile = $imagePath.'/'.basename($file);

                file_put_contents($imageFile, file_get_contents(trim($file)));

                $sourcePath = "imported-products/extracted-images/admin/".($flag ? 'sample-files' : 'link-sample-files').'/'.$dataFlowProfileRecord->id.'/'.basename($file);

                $destination = "product/".$id.'/'.basename($file);

                Storage::copy($sourcePath, $destination);

                return $destination;
            }
        } catch(\Exception $e) {
            Log::error('downloadable fileOrUrlUpload log: '. $e->getMessage());
        }
    }

    /**
     * upload link file or url
     *
     * @param \Webkul\BulkUpload\Contracts\ImportProduct $dataFlowProfileRecord
     * @param string $type
     * @param string|array $file
     * @param integer $id
     * @param array $downloadableLinks
     * @return mixed
     */
    public function linkFileOrUrlUpload($dataFlowProfileRecord, $type, $file, $id, $downloadableLinks)
    {
        try {
            if (trim($type) == "file") {
                // Determine the file path
                $sourcePath = "imported-products/extracted-images/admin/link-files/".$dataFlowProfileRecord->id.'/'.$downloadableLinks['upload_link_filesZipName']['dirname'].'/'.trim(basename($file));

                $destination = "product_downloadable_links/".$id.'/'.basename($file);

                // Copy the file to the destination
                Storage::copy($sourcePath, $destination);

                return $destination;
            } else {
                // Handle URL upload
                $filePath = storage_path('app/public/imported-products/extracted-images/admin/link-files/'.$dataFlowProfileRecord->id);

                if (!file_exists($filePath)) {
                    mkdir($filePath, 0777, true);
                }

                $imageFile = $filePath.'/'.basename($file);

                file_put_contents($imageFile, file_get_contents(trim($file)));

                $sourcePath = "imported-products/extracted-images/admin/link-files/".$dataFlowProfileRecord->id.'/'.basename($file);

                $destination = "product_downloadable_links/".$id.'/'.basename($file);

                Storage::copy($sourcePath, $destination);

                return $destination;
            }
        } catch(\Exception $e) {
            Log::error('downloadable linkFileOrUrlUpload log: '. $e->getMessage());
        }
    }

    /**
     * unzip zip files and store in storage folder
     *
     * @param \Webkul\BulkUpload\Contracts\ImportProduct $record
     * @return mixed
     */
    public function extractDownloadableFiles($record)
    {
        $result = [];

        $fileTypes = ['upload_link_files', 'upload_sample_files', 'upload_link_sample_files'];

        foreach ($fileTypes as $fileType) {

            if (isset($record->$fileType) && $record->$fileType !== "") {
                $zipArchive = new \ZipArchive();

                $extractedPath = storage_path("app/public/imported-products/extracted-images/admin/{$fileType}/{$record->id}/");

                if ($zipArchive->open(storage_path("app/public/{$record->$fileType}"))) {
                    for ($i = 0; $i < $zipArchive->numFiles; $i++) {
                        $filename = $zipArchive->getNameIndex($i);

                        $result["{$fileType}ZipName"] = pathinfo($filename);
                    }

                    $zipArchive->extractTo($extractedPath);
                    
                    $zipArchive->close();
                }
            }
        }

        return $result;
    }
}
