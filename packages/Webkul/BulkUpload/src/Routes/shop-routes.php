<?php

use Illuminate\Support\Facades\Route;
use Webkul\BulkUpload\Http\Controllers\Shop\OnepageCheckoutController;

Route::group(['middleware' => ['web','locale', 'theme', 'currency']], function () {
    Route::controller(OnepageCheckoutController::class)->prefix('checkout/slot')->group(function () {
        Route::get('', 'index')->name('shop.checkout.slot.index');
    });

    Route::controller(OnepageCheckoutController::class)->prefix('checkout/slot')->group(function () {
        Route::get('/property', 'property')->name('shop.checkout.slot.image');
    });
});
