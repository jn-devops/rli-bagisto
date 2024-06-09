<?php

namespace Webkul\BulkUpload\Helpers;

use Illuminate\Support\Facades\Storage;

class ResultHelper
{
    /**
     * Store Bulk Upload Result in json file
     */
    public function result($data, $file)
    {
        $filePath = 'imported-products/admin/result/' . $file;

        $links = Storage::get($filePath);;

        Storage::put($filePath, collect(json_decode($links))->push($data));
    }

    /**
     * Deleting All result File
     */
    public function removeAllFile()
    {
        $directory = 'imported-products/admin/result/';

        $files = [
                'bulk_upload_error.json',
                'image_not_found.json',
                'product_uploaded.json',
            ];

        foreach ($files as $file) {
            Storage::delete($directory . $file);
        }
    }
}
