<?php

use Illuminate\Support\Facades\Route;
use Webkul\Ekyc\Http\Controllers\EkycController;

Route::group(['middleware' => ['locale', 'theme', 'currency']], function () {
    Route::controller(EkycController::class)->prefix('checkout/ekyc')->group(function () {
        Route::get('/{slug}/{cartId}', 'index')->name('ekyc.verification.index');

        Route::post('/verification', 'store')->name('ekyc.verification.store');

        Route::get('/verification', 'getVerification')->name('ekyc.verification.get');

        Route::get('/verifying', 'verifying')->name('ekyc.verification.verifying');

        Route::post('/customer-login', 'customerLogin')->name('ekyc.verification.customer.login');
    });
});
