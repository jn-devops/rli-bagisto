<?php

use Illuminate\Support\Facades\Route;
use Webkul\Store\Http\Controllers\CartController;
use Webkul\Store\Http\Controllers\OnepageController;

Route::group(['middleware' => ['locale', 'theme', 'currency']], function () {
    /**
     * Cart routes.
     */
    Route::controller(CartController::class)->prefix('checkout/cart')->group(function () {
        Route::get('', 'index')->name('store.checkout.cart.index');
    });

    Route::controller(OnepageController::class)->prefix('checkout/onepage')->group(function () {
        Route::get('', 'index')->name('store.checkout.onepage.index');

        Route::get('success', 'success')->name('store.checkout.onepage.success');
    });
});
