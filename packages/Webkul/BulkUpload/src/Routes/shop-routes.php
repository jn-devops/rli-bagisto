<?php

use Illuminate\Support\Facades\Route;
use Webkul\BulkUpload\Http\Controllers\Shop\OnepageCheckoutController;

Route::group(['middleware' => ['web','locale', 'theme', 'currency']], function () {
    Route::controller(OnepageCheckoutController::class)->prefix('checkout/bulk-upload')->group(function () {
        Route::get('/images', 'index')->name('shop.checkout.bulkUpload.property.images');

        Route::get('/slots', 'property')->name('shop.checkout.bulkUpload.property.image');
    });
});
