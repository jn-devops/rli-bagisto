### SOME USEFULL CHANGE IN CORE FILE.

1. Path: packages/Webkul/Sales/src/Transformers/OrderResource.php

    Search : `'items'                 => OrderItemResource::collection($this->items)->jsonSerialize(),`

    After: 
        `
            'processing_fee'        => ($this->processing_fee * $this->items_qty),
            'property_code'         => $this->property_code,
        `

3. Path: packages/Webkul/Sales/src/Repositories/ShipmentRepository.php

    Search: `'additional'    => $orderItem->additional,`
    Add Below: 
    `
        // Customization code
        'total'          => ($orderItem->price + $orderItem->processing_fee) * $qty,
        'processing_fee' => $orderItem->processing_fee,
    `

4. Path: packages/Webkul/Sales/src/Repositories/InvoiceRepository.php

    Search: `'order_address_id'      => $order->billing_address->id,`
    Add Below: `'processing_fee'        => $order->processing_fee,`

    Search: `'additional'           => $orderItem->additional,`
    Add Below:
    `
        'base_total'     => ($orderItem->base_price + $orderItem->processing_fee) * $qty,
        'processing_fee' => $orderItem->processing_fee,
    `

    Search: `'additional'           => $childOrderItem->additional,`
    Add Below:
    `
        'base_total'     => ($childOrderItem->base_price + $orderItem->processing_fee) * $finalQty,
        'processing_fee' => $childOrderItem->processing_fee,
    `

5. Path: packages/Webkul/Product/src/Type/Configurable.php

    Search: `$price = $childProduct->getTypeInstance()->getFinalPrice();`
    Add Below and replace array:
    `
   
        $attribute = $this->attributeRepository->findOneByField('code', 'processing_fee');

        $attributeValue = app(ProductAttributeValueRepository::class)
                    ->findOneWhere([
                        'product_id'   => $childProduct->id,
                        'attribute_id' => $attribute->id,
                    ]);

        $attributeInValue = 0;

        if ($attributeValue) {
            $attributeInValue = ((float) $attributeValue->float_value);
        }

        return [
            [
                'product_id'        => $this->product->id,
                'sku'               => $this->product->sku,
                'name'              => $this->product->name,
                'type'              => $this->product->type,
                'quantity'          => $data['quantity'],
                'price'             => $convertedPrice = core()->convertPrice($price),
                'base_price'        => $price,
                'total'             => $convertedPrice + $attributeInValue * $data['quantity'],
                'base_total'        => $price * $data['quantity'],
                'weight'            => $childProduct->weight,
                'total_weight'      => $childProduct->weight * $data['quantity'],
                'base_total_weight' => $childProduct->weight * $data['quantity'],
                'additional'        => $this->getAdditionalOptions($data),
            ], [
                'parent_id'  => $this->product->id,
                'product_id' => (int) $data['selected_configurable_option'],
                'sku'        => $childProduct->sku,
                'name'       => $childProduct->name,
                'type'       => $childProduct->type,
                'additional' => [
                    'product_id' => (int) $data['selected_configurable_option'],
                    'parent_id'  => $this->product->id,
                ],
            ],
        ];
    `

6. Path:  packages/Webkul/Admin/src/Resources/views/sales/orders/view.blade.php
    Search: `@lang('admin::app.sales.orders.view.summary-tax')`

    Add Below: 
    `
        <!-- customization part -->
        <p class="text-gray-600 dark:text-gray-300">
            @lang('bulkUpload::app.shop.bulk-upload.checkout.onepage.processing_fee')
        </p>
        <!-- customization part -->
    `

    Search: `{{ core()->formatBasePrice($order->base_tax_amount) }}`

    Add Below: 
    `
        <!-- customization part -->
        <p class="text-gray-600 dark:text-gray-300">
            {{ core()->formatBasePrice($order->processing_fee) }}
        </p>
        <!-- customization part -->
    `

7. Path: packages/Webkul/Shop/src/Http/Resources/CartResource.php
    Search: `'payment_method'                 => $this->payment?->method,`

    Add Below: 
    `
    <!-- Customization code -->
    'property_code'  => $this->property_code ?? 0,
    'processing_fee' => core()->currency($this->processing_fee * $this->items_qty),
    <!-- Customization code -->
    `

8. Path: packages/Webkul/Shop/src/Http/Controllers/API/CartController.php

    Search: `$cart = Cart::addProduct($product, request()->all());`
    Add Below: 
    `
    $response['ekyc_redirect'] = route('ekyc.verification.index', [
            'slug'   => Str::slug(strtolower($product->getAttribute('name'))),
            'cartId' => $cart->id,
        ]);
    `