<?php

use Illuminate\Support\Facades\Route;
use Webkul\BulkUpload\Http\Controllers\Shop\OnepageCheckoutController;

Route::group(['middleware' => ['web', 'locale', 'theme', 'currency']], function () {
    Route::controller(OnepageCheckoutController::class)
        ->prefix('checkout/bulk-upload')
        ->group(function () {
            Route::get('/store-authentication', 'authentication')->name('shop.checkout.authentication.store');
        });
});
