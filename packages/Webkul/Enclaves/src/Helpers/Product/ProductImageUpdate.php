<?php

namespace Webkul\Enclaves\Helpers\Product;

class ProductImageUpdate
{
    /**
     * Add image details in ProductMediaRepository repo.
     *
     * @param  mixed  $product
     * @return void
     */
    public function insertImages($product)
    {
        $request = request()->all();
       
        $position = 0;

        if (empty($request['images_url'])) {
            return false;
        }
   
        foreach (explode(',', $request['images_url']) as $file) {
            $product->images()->create([
                'path'       => 'product/' . $product->id . '/' . $file,
                'product_id' => $product->id,
                'position'   => ++$position,
            ]);
        }
    }
}
