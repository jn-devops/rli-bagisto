<?php

use Illuminate\Support\Facades\Route;
use Webkul\Shop\Http\Controllers\CartController;
use Webkul\Shop\Http\Controllers\EkycController;
use Webkul\Shop\Http\Controllers\OnepageController;

Route::group(['middleware' => ['locale', 'theme', 'currency']], function () {
    /**
     * Cart routes.
     */
    Route::controller(CartController::class)->prefix('checkout/cart')->group(function () {
        Route::get('', 'index')->name('shop.checkout.cart.index');
    });

    Route::controller(OnepageController::class)->prefix('checkout/onepage')->group(function () {
        Route::get('', 'index')->name('shop.checkout.onepage.index');

        Route::get('success', 'success')->name('shop.checkout.onepage.success');
    });

    Route::controller(EkycController::class)->prefix('checkout/ekyc')->group(function () {
        Route::get('/{slug}', 'index')->name('shop.checkout.ekyc.index');
    });
});
