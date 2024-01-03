<?php

namespace Webkul\KrayinConnector\Hooks\Senders;

use Illuminate\Support\Facades\Log;
use Spatie\WebhookServer\WebhookCall;
use Webkul\Product\Repositories\ProductRepository;

class ProductSender
{
    /**
     * create product on krayin crm.
     *
     * @return void
     */
    public static function create($product)
    {
        $payload = [
            'api_entity_type'           => 'product.create',
            'api_entity_source_type_id' => 2,
            'api_entity_id'             => $product->id,
            'sku'                       => $product->sku,
            'name'                      => $product->getAttribute('name'),
            'description'               => $product->getAttribute('description'),
            'quantity'                  => $product->inventory_source_qty(core()->getRequestedChannel()->id),
            'price'                     => $product->getAttribute('price'),
        ];

        try {
            WebhookCall::create()
                ->url(webhook_server_url())
                ->useSecret(webhook_server_secret())
                ->payload($payload)
                ->dispatch();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * update refund on krayin crm.
     *
     * @return void
     */
    public static function updateProductQty($refund) 
    {
        try {
            foreach($refund->items->pluck('additional')->toArray() as $item)
            {
                $product = app(ProductRepository::class)->findOrFail($item['product_id']);
               
                $payload = [
                    'api_entity_type'           => 'product.refund.quantity',
                    'api_entity_source_type_id' => 2,
                    'api_entity_id'             => $item['product_id'],
                    'quantity'                  => $product->inventory_source_qty(core()->getRequestedChannel()->id),
                ];

                WebhookCall::create()
                    ->url(webhook_server_url())
                    ->useSecret(webhook_server_secret())
                    ->payload($payload)
                    ->dispatch();   

            }   
        } catch (\Throwable $th) {
            //throw $th;
        }     
    }
    
    /**
     * delete product on krayin crm.
     *
     * @return void
     */
    public static function daleteProductQty($id)
    {
        $payload = [
            'api_entity_type'           => 'product.delete',
            'api_entity_source_type_id' => 2,
            'api_entity_id'             => $id,
        ];

        WebhookCall::create()
                    ->url(webhook_server_url())
                    ->useSecret(webhook_server_secret())
                    ->payload($payload)
                    ->dispatch();
    }
}
