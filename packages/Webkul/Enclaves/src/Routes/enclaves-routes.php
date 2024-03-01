<?php
namespace Webkul\Enclaves\Routes;

use Illuminate\Support\Facades\Route;
use Webkul\Enclaves\Http\Controllers\Product\ProductController;
use Webkul\Enclaves\Http\Controllers\Customer\Account\DashboardController;
use Webkul\Enclaves\Http\Controllers\Customer\Account\DocumentsController;
use Webkul\Enclaves\Http\Controllers\Customer\Account\InquiriesController;
use Webkul\Enclaves\Http\Controllers\Customer\Account\HelpSeminarController;
use Webkul\Enclaves\Http\Controllers\Customer\Account\TransactionController;

Route::group(['middleware' => ['locale', 'theme', 'currency']], function () {
    Route::controller(DashboardController::class)->prefix('customer/account/dashboard')->group(function () {
        Route::get('', 'index')->name('enclaves.customers.account.dashboard.index');
    });

    Route::controller(DocumentsController::class)->prefix('customer/account/documents')->group(function () {
        Route::get('', 'index')->name('enclaves.customers.account.documents.index');
    });

    Route::controller(InquiriesController::class)->prefix('customer/account/inquiries')->group(function () {
        Route::get('', 'index')->name('enclaves.customers.account.inquiries.index');

        Route::get('/tickets', 'tickets')->name('enclaves.customers.account.inquiries.tickets');

        Route::post('/tickets', 'store')->name('enclaves.customers.account.inquiries.store');
    });

    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('most-view', 'mostViewProducts')->name('enclaves.product.most-view.index');
    });

    Route::controller(TransactionController::class)->prefix('/customer/account/transactions')->group(function () {
        Route::get('', 'index')->name('shop.customers.account.transactions.index');
    
        Route::get('view/{id}', 'view')->name('shop.customers.account.transactions.view');

        Route::post('cancel/{id}', 'cancel')->name('shop.customers.account.transactions.cancel');

        Route::get('print/Invoice/{id}', 'printInvoice')->name('shop.customers.account.transactions.print-invoice');
    });

    Route::controller(HelpSeminarController::class)->prefix('/customer/account/help-seminar')->group(function () {
        Route::get('', 'index')->name('enclaves.customers.account.help-seminar.index');
    });
});
