<?php

namespace Webkul\Enclaves\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class EnclavesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Route::middleware('web')->group(__DIR__ . '/../Routes/web.php');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'enclaves');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'enclaves');

        Blade::anonymousComponentPath(__DIR__ . '/../Resources/views/admin/components', 'enclaves-admin');

        Blade::anonymousComponentPath(__DIR__ . '/../Resources/views/shop/components', 'enclaves-shop');

        $sourceViewPath = __DIR__ . '/../Resources/views/shop';
        $sourceThemesPath = __DIR__ . '/../../publishable/themes';

        $publishes = [];

        // Check if the source directories exist before adding them to the publishes array
        if (is_dir($sourceViewPath)) {
            $publishes[$sourceViewPath] = resource_path('themes/enclaves/views/shop');
        }

        if (is_dir($sourceThemesPath)) {
            $publishes[$sourceThemesPath] = public_path('themes');
        }

        if (!empty($publishes)) {
            $this->publishes($publishes);
        }

        require __DIR__ . '/../Routes/breadcrumbs.php';

        $this->app->register(EventServiceProvider::class);

        $this->app->register(ModuleServiceProvider::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
    }

    /**
     * Register package config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/store-menu.php',
            'menu.customer'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/admin-menu.php',
            'menu.admin'
        );
    }
}
