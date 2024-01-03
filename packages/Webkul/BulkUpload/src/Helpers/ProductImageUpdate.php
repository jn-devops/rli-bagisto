<?php

namespace Webkul\BulkUpload\Helpers;

class ProductImageUpdate
{
     /**
     * Add image details in ProductMediaRepository repo.
     *
     */
    public function insertImages($product) 
    {
        $request = request()->all();

        $position = 0;

        if(empty($request['images_url']))
        {
            return false;
        }

        foreach (explode(',',$request['images_url']) as $file) 
        {
            $product->images()->create([
                'path'       => 'product/' . $product->id. '/'. $file,
                'product_id' => $product->id,
                'position'   => ++$position,
            ]);
        }
    }
}
