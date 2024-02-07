<?php

namespace Webkul\BulkUpload\Type;

use Webkul\Product\Type\Virtual as VirtualProductType;

class Virtual extends VirtualProductType
{
    /**
     * Returns product show quantity box
     *
     * @return string
     */
    public function showQuantityBox()
    {
        return $this->showQuantityBox = false;
    }

    /**
     * Returns product show add to cart button
     *
     * @return bool
     */
    public function showAddToCartButton()
    {
        return false;
    }
}