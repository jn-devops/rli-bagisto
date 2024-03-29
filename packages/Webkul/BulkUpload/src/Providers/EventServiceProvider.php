<?php

namespace Webkul\BulkUpload\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Webkul\BulkUpload\Helpers\ProductImageUpdate;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen('bagisto.shop.products.price.after', function($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('bulkupload::shop.bulk-upload.price.processing_fee');
        });
        
        Event::listen('bagisto.admin.catalog.product.edit.form.images.before', function($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('bulkupload::admin.bulk-upload.images.url');
        });

        //bagisto.admin.catalog.product.edit.form.images.after | bagisto.admin.catalog.product.edit.actions.before 
        // Event::listen('bagisto.admin.catalog.product.edit.form.images.after', function($viewRenderEventManager) {
        //     $viewRenderEventManager->addTemplate('bulkupload::admin.bulk-upload.images.spot');
        // });

        /**
         * enable payment option
         */
        Event::listen('bagisto.shop.checkout.addresses.after', function($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('bulkupload::shop.bulk-upload.checkout.properties');
        });

        Event::listen('catalog.product.update.after', function($product) {
            app(ProductImageUpdate::class)->insertImages($product);
        });
    }
}