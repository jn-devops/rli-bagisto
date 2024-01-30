<?php

use Illuminate\Support\Facades\Route;
use Webkul\BulkUpload\Http\Controllers\Shop\OnepageCheckoutController;

Route::group(['middleware' => ['web','locale', 'theme', 'currency']], function () {

    Route::controller(OnepageCheckoutController::class)->prefix('checkout/bulk-upload')->group(function () {
        Route::get('/images', 'index')->name('shop.checkout.property.images');

        Route::get('/slots', 'property')->name('shop.checkout.property.image');

        Route::post('/store-authentication', 'authentication')->name('shop.checkout.authentication.store');
        
        Route::post('/verifing-property', 'verifingProperty')->name('shop.checkout.authentication.api.verify');
        
        Route::get('/waiting-kyc-verification', 'kycResponse')->name('shop.checkout.kyc.response');
    });
});
