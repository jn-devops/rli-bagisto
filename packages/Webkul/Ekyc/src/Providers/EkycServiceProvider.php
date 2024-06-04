<?php

namespace Webkul\Ekyc\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class EkycServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');

        Route::middleware('web')->group(__DIR__ . '/../Routes/web.php');

        $this->app->register(EventServiceProvider::class);
    }
}
