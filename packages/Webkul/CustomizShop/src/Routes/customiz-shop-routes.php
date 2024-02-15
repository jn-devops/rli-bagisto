<?php
namespace Webkul\CustomizShop\Routes;

use Illuminate\Support\Facades\Route;
use Webkul\CustomizShop\Http\Controllers\DashboardController;
use Webkul\CustomizShop\Http\Controllers\DocumentsController;

Route::group(['middleware' => ['locale', 'theme', 'currency']], function () {
    Route::controller(DashboardController::class)->prefix('customer/account/dashboard')->group(function () {
        Route::get('', 'index')->name('customers.account.dashboard.index');
    });

    Route::controller(DocumentsController::class)->prefix('customer/account/documents')->group(function () {
        Route::get('', 'index')->name('customers.account.documents.index');
    });
});
