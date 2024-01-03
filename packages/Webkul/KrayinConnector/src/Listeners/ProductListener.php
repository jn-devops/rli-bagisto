<?php

namespace Webkul\KrayinConnector\Listeners;

use Webkul\KrayinConnector\Hooks\Senders\ProductSender;

class ProductListener
{
    
    /**
     * Create product in Krayin.
     *
     * @param  object  $product
     * @return void
     */
    public function createProductInKrayin($product)
    {
        ProductSender::create($product);
    }

    /**
     * Update product Qty in Krayin.
     *
     * @param  object  $product
     * @return void
     */
    public function updateProductQtyInKrayin($product)
    {
        ProductSender::updateProductQty($product);
    }

    /**
     * Delete Product Id.
     *
     * @param  object  $id
     * @return void
     */
    public function deleteProductInKrayin($id) 
    {
        ProductSender::daleteProductQty($id);
    }
}
