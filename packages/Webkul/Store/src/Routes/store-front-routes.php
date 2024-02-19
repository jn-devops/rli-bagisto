<?php

use Illuminate\Support\Facades\Route;
use Webkul\Store\Http\Controllers\CMS\PagePresenterController;
use Webkul\Store\Http\Controllers\CompareController;
use Webkul\Store\Http\Controllers\HomeController;
use Webkul\Store\Http\Controllers\ProductController;
use Webkul\Store\Http\Controllers\ProductsCategoriesProxyController;
use Webkul\Store\Http\Controllers\SearchController;
use Webkul\Store\Http\Controllers\SubscriptionController;

Route::group(['middleware' => ['locale', 'theme', 'currency']], function () {
    /**
     * CMS pages.
     */
    Route::get('page/{slug}', [PagePresenterController::class, 'presenter'])
        ->name('store.cms.page')
        ->middleware('cacheResponse');

    /**
     * Fallback route.
     */
    Route::fallback(ProductsCategoriesProxyController::class . '@index')
        ->name('store.product_or_category.index')
        ->middleware('cacheResponse');

    /**
     * Store front home.
     */
    Route::get('/', [HomeController::class, 'index'])
        ->name('store.home.index')
        ->middleware('cacheResponse');

    /**
     * Store front search.
     */
    Route::get('search', [SearchController::class, 'index'])
        ->name('store.search.index')
        ->middleware('cacheResponse');

    Route::post('search/upload', [SearchController::class, 'upload'])->name('store.search.upload');

    /**
     * Subscription routes.
     */
    Route::controller(SubscriptionController::class)->group(function () {
        Route::post('subscription', 'store')->name('store.subscription.store');

        Route::get('subscription/{token}', 'destroy')->name('store.subscription.destroy');
    });

    /**
     * Compare products
     */
    Route::get('compare', [CompareController::class, 'index'])
        ->name('store.compare.index')
        ->middleware('cacheResponse');

    /**
     * Downloadable products
     */
    Route::controller(ProductController::class)->group(function () {
        Route::get('downloadable/download-sample/{type}/{id}', 'downloadSample')->name('store.downloadable.download_sample');

        Route::get('product/{id}/{attribute_id}', 'download')->defaults('_config', [
            'view' => 'store.products.index',
        ])->name('store.product.file.download');
    });
});
