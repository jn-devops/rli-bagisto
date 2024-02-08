<?php

namespace Webkul\BulkUpload\Type;

use Webkul\Product\Type\Simple as SimpleProductType;

class Simple extends SimpleProductType
{
    /**
     * Returns product show quantity box
     *
     * @return bool
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