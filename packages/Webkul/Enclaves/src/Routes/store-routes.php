<?php
namespace Webkul\Enclaves\Routes;

use Illuminate\Support\Facades\Route;
use Webkul\Enclaves\Http\Controllers\DashboardController;
use Webkul\Enclaves\Http\Controllers\DocumentsController;
use Webkul\Enclaves\Http\Controllers\InquiriesController;

Route::group(['middleware' => ['locale', 'theme', 'currency']], function () {
    Route::controller(DashboardController::class)->prefix('customer/account/dashboard')->group(function () {
        Route::get('', 'index')->name('enclaves.customers.account.dashboard.index');
    });

    Route::controller(DocumentsController::class)->prefix('customer/account/documents')->group(function () {
        Route::get('', 'index')->name('enclaves.customers.account.documents.index');
    });

    Route::controller(InquiriesController::class)->prefix('customer/account/inquiries')->group(function () {
        Route::get('', 'index')->name('enclaves.customers.account.inquiries.index');
    });
});
