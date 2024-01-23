<?php

namespace Webkul\KrayinConnector\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Webkul\KrayinConnector\Providers\EventServiceProvider;

class KrayinConnectorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__ . '/../Http/helpers.php';

        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        
        $this->publishes([
            dirname(__DIR__) . '/Config/webhook-client.php' => config_path('webhook-client.php'),
            dirname(__DIR__) . '/Config/webhook-server.php' => config_path('webhook-server.php'),
        ]);

        Event::listen('catalog.product.update.after', function ($product) {
            app(\Webkul\KrayinConnector\Listeners\ProductListener::class)->createProductInKrayin($product);
        });

        Event::listen('catalog.product.delete.after', function ($product) {
            app(\Webkul\KrayinConnector\Listeners\ProductListener::class)->deleteProductInKrayin($product);
        });

        Event::listen('sales.refund.save.after', function ($refund) {
            app(\Webkul\KrayinConnector\Listeners\ProductListener::class)->updateProductQtyInKrayin($refund);
        });
    }
}
