<?php

use Illuminate\Support\Facades\Route;
use Webkul\Enclaves\Http\Controllers\Admin\Ticket\FaqController;
use Webkul\Enclaves\Http\Controllers\Admin\Theme\ThemeController;
use Webkul\Enclaves\Http\Controllers\Admin\Ticket\TicketsController;
use Webkul\Enclaves\Http\Controllers\Admin\Channel\ReadUrlChannelController;
use Webkul\Enclaves\Http\Controllers\Admin\Product\ReadUrlProductController;
use Webkul\Enclaves\Http\Controllers\Admin\Category\ReadUrlCategoryController;

/**
 * Settings routes.
 */
Route::group(['middleware' => ['admin'], 'prefix' => config('app.admin_url')], function () {

    // Over ride route
    Route::controller(ThemeController::class)->group(function () {
        Route::get('settings/themes/edit/{id}', 'edit')->name('admin.settings.themes.edit');
  
        Route::post('edit/{id}', 'update')->name('enclaves.settings.themes.update');
    });

    // Ticket
    Route::controller(TicketsController::class)->prefix('inquiries/tickets')->group(function () {
        Route::get('', 'index')->name('enclaves.admin.inquiries.tickets');

        Route::get('view/{id}', 'view')->name('enclaves.admin.inquiries.ticket.view');

        Route::post('', 'store')->name('enclaves.admin.inquiries.ticket.store');

        Route::post('update/{id}', 'update')->name('enclaves.admin.inquiries.ticket.update');

        Route::get('delete/{id}', 'destroy')->name('enclaves.admin.inquiries.ticket.destroy');

        Route::post('mass-delete', 'massDestroy')->name('enclaves.admin.inquiries.ticket.mass-destroy');
    });

    // FAQ
    Route::controller(FaqController::class)->prefix('inquiries/faq')->group(function () {
        Route::get('', 'index')->name('enclaves.admin.inquiries.faq');

        Route::post('store', 'store')->name('enclaves.admin.inquiries.faq.store');

        Route::get('edit/{id}', 'edit')->name('enclaves.admin.inquiries.faq.edit');

        Route::post('update', 'update')->name('enclaves.admin.inquiries.faq.update');

        Route::post('delete/{id}', 'destroy')->name('enclaves.admin.inquiries.faq.destroy');

        Route::post('mass-delete', 'massDestroy')->name('enclaves.admin.inquiries.faq.mass-destroy');
    });

    // CDN Link Url
    Route::prefix('reading-url')->group(function () {
        Route::post('category/{id}', [ReadUrlCategoryController::class, 'index'])
            ->name('enclaves.admin.category.image.url');

        Route::post('category', [ReadUrlCategoryController::class, 'store'])
            ->name('enclaves.admin.category.image.upload');

        Route::post('product/{id}', [ReadUrlProductController::class, 'index'])
            ->name('enclaves.admin.product.image.url');

        Route::post('channel', [ReadUrlChannelController::class, 'index'])
            ->name('enclaves.admin.channel.image.url');
    });
});