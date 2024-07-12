<?php

namespace Webkul\GoogleShoppingFeed\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class GShoppingFeedServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Route::middleware('web')->group(__DIR__ . '/../Routes/admin-routes.php');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'google_feed');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'google_feed');

        $this->app->register(ModuleServiceProvider::class);

        $this->publishes([
            __DIR__ . '/../Resources/views/admin/catalog/products/edit.blade.php' => resource_path('views/vendor/admin/catalog/products/edit.blade.php'),
        ]);

        // if (core()->getConfigData('google_feed.settings.general.package_status')) {
            $this->mergeConfigFrom(
                dirname(__DIR__) . '/Config/menu.php', 'menu.admin'
            );
        // }

        Event::listen('bagisto.admin.layout.head', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('google_feed::admin.components.style');
        });
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
            dirname(__DIR__) . '/Config/system.php', 'core'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/acl.php', 'acl'
        );
    }
}