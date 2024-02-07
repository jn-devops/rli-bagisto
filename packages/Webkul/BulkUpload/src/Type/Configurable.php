<?php

namespace Webkul\BulkUpload\Type;

use Webkul\Product\Type\Configurable as ConfigurableProductType;

class Configurable extends ConfigurableProductType
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