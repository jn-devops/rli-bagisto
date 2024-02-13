<?php

use Illuminate\Support\Facades\Route;
use Webkul\CustomizShop\Http\Controllers\DashboardController;

Route::group(['middleware' => ['locale', 'theme', 'currency']], function () {
    Route::controller(DashboardController::class)->prefix('customer/account/dashboard')->group(function () {
        Route::get('', 'index')->name('customers.account.dashboard.index');
    });
});
