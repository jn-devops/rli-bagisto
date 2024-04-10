<?php

namespace Webkul\Enclaves\Listeners;

use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Product\Repositories\ProductAttributeValueRepository;

class Cart
{
    /**
     * After order is created
     *
     * @return void
     */
    public function afterCreate($cart)
    {
        foreach ($cart->items as $item) {
            $attribute = app(AttributeRepository::class)->findOneByField('code', 'processing_fee');

            $attributeValue = app(ProductAttributeValueRepository::class)
                ->findOneWhere([
                    'product_id'   => $item->product_id,
                    'attribute_id' => $attribute->id,
                ]);

            $attributeInValue = 0;

            if ($attributeValue) {
                $attributeInValue = ((float) $attributeValue->float_value);
            }

            $cart->processing_fee = $attributeInValue;
        }

        $cart->grand_total = $cart->sub_total + $cart->tax_total + ($cart->processing_fee ?? 0) - $cart->discount_amount;
        $cart->base_grand_total = $cart->base_sub_total + $cart->base_tax_total + ($cart->processing_fee ?? 0) - $cart->base_discount_amount;

        $cart->update();
    }
}
