<?php

namespace Webkul\Store\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class StoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'store');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'store');

        Blade::anonymousComponentPath(__DIR__ . '/../Resources/views/components', 'store');

        $this->publishes([
            __DIR__ . '/../Resources/views' => resource_path('themes/store/views'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }
}
