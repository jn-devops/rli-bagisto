<?php

use Illuminate\Support\Facades\Route;
use Webkul\GoogleShoppingFeed\Http\Controllers\AttributeController;
use Webkul\GoogleShoppingFeed\Http\Controllers\CategoryController;
use Webkul\GoogleShoppingFeed\Http\Controllers\ProductController;
use Webkul\GoogleShoppingFeed\Http\Controllers\AccountController;

Route::group(['middleware' => ['admin']], function () {
    Route::prefix(config('app.admin_url'))->group(function () {
        Route::controller(AttributeController::class)->prefix('map/attribute')->group(function() {

            Route::get('', 'index')->name('google_feed.attribute.index');

            Route::post('store', 'store')->name('google_feed.attribute.index.store');

            Route::get('refresh/{id}', 'destroy')->name('google_feed.attribute.index.refresh');
        });

        Route::controller(CategoryController::class)->prefix('map/category')->group(function() {
            Route::get('', 'index')->name('google_feed.category.index');

            Route::get('create', 'create')->name('google_feed.category.map.create');

            Route::post('create', 'store')->name('google_feed.category.map.store');

            Route::post('mass-delete', 'massDestroy')->name('google_feed.category.mass_delete');
        });

        Route::controller(AccountController::class)->prefix('google-shopping-feed/auth')->group(function() {
            Route::get('', 'index')->name('google_feed.account.auth');

            Route::post('authenticate', 'store')->name('google_feed.account.authenticate');

            Route::get('redirect', 'redirect')->name('google_feed.account.auth.redirect');

            Route::get('refresh/token', 'refresh')->name('google_feed.account.authenticate.refresh');
        });

        Route::controller(ProductController::class)->prefix('export')->group(function() {
            Route::get('','index')->name('google_feed.products.export.index');

            Route::get('export', 'export')->name('google_feed.products.export');
        });
    });
});