<?php

namespace Webkul\Enclaves\Routes;

use Illuminate\Support\Facades\Route;
use Webkul\Enclaves\Http\Controllers\Ekyc\EkycController;
use Webkul\Enclaves\Http\Controllers\Product\ProductController;
use Webkul\Enclaves\Http\Controllers\Category\CategoryController;
use Webkul\Enclaves\Http\Controllers\Customer\CustomerController;
use Webkul\Enclaves\Http\Controllers\Checkout\OnePageCheckoutController;
use Webkul\Enclaves\Http\Controllers\Customer\Account\DashboardController;
use Webkul\Enclaves\Http\Controllers\Customer\Account\DocumentsController;
use Webkul\Enclaves\Http\Controllers\Customer\Account\InquiriesController;
use Webkul\Enclaves\Http\Controllers\Customer\Account\HelpSeminarController;
use Webkul\Enclaves\Http\Controllers\Customer\Account\NewsUpdatesController;
use Webkul\Enclaves\Http\Controllers\Customer\Account\TransactionController;

Route::group(['middleware' => ['locale', 'theme', 'currency']], function () {

    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::post('customer-profile-update', 'profileUpdate')->name('enclaves.customers.account.profile.update');
    });

    Route::prefix('customer')->group(function () {
        Route::group(['middleware' => ['customer']], function () {

            Route::prefix('account')->group(function () {
                Route::controller(DashboardController::class)->prefix('dashboard')->group(function () {
                    Route::get('', 'index')->name('enclaves.customers.account.dashboard.index');
                });

                Route::controller(DocumentsController::class)->prefix('documents')->group(function () {
                    Route::get('', 'index')->name('enclaves.customers.account.documents.index');
                });

                Route::controller(InquiriesController::class)->prefix('inquiries')->group(function () {
                    Route::get('', 'index')->name('enclaves.customers.account.inquiries.index');

                    Route::get('tickets', 'tickets')->name('enclaves.customers.account.inquiries.tickets');

                    Route::post('tickets', 'store')->name('enclaves.customers.account.inquiries.store');
                });

                Route::controller(TransactionController::class)->prefix('transactions')->group(function () {
                    Route::get('', 'index')->name('shop.customers.account.transactions.index');

                    Route::get('view/{id}', 'view')->name('shop.customers.account.transactions.view');

                    Route::post('cancel/{id}', 'cancel')->name('shop.customers.account.transactions.cancel');

                    Route::get('print/Invoice/{id}', 'printInvoice')->name('shop.customers.account.transactions.print-invoice');
                });

                Route::controller(HelpSeminarController::class)->prefix('help-seminar')->group(function () {
                    Route::get('', 'index')->name('enclaves.customers.account.help-seminar.index');
                });

                Route::controller(NewsUpdatesController::class)->prefix('news-updates')->group(function () {
                    Route::get('', 'index')->name('enclaves.customers.account.news-updates.index');
                });

                Route::controller(CustomerController::class)->prefix('profile')->group(function () {
                    Route::get('', 'index')->name('shop.customers.account.profile.index');

                    Route::get('attributes', 'getAttributes')->name('shop.customers.account.profile.attributes');

                    Route::post('edit', 'update')->name('shop.customers.account.profile.store');

                    Route::get('edit', 'edit')->name('shop.customers.account.profile.edit');

                    Route::post('destroy', 'destroy')->name('shop.customers.account.profile.destroy');

                    Route::get('reviews', 'reviews')->name('shop.customers.account.reviews.index');
                });
            });
        });
    });

    Route::controller(OnePageCheckoutController::class)->prefix('checkout/bulk-upload')->group(function () {
        Route::get('/store-authentication', 'authentication')->name('shop.checkout.authentication.store');
    });

    Route::group(['prefix' => 'api'], function () {
        Route::controller(CategoryController::class)->prefix('categories')->group(function () {
            Route::get('', 'index')->name('enclaves.api.categories.index');
        });

        Route::controller(EkycController::class)->prefix('ekyc')->group(function () {
            Route::get('', 'index')->name('enclaves.api.property.verfiy-url.index');
        });
    });
});
