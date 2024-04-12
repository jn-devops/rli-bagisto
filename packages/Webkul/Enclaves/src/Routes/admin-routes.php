<?php

use Illuminate\Support\Facades\Route;
use Webkul\Enclaves\Http\Controllers\Admin\InquiriesController;
use Webkul\Enclaves\Http\Controllers\Admin\ThemeController;

/**
 * Settings routes.
 */
Route::group(['middleware' => ['admin'], 'prefix' => config('app.admin_url')], function () {

    // Over ride route
    Route::controller(ThemeController::class)->group(function () {
        Route::get('settings/themes/edit/{id}', 'edit')->name('admin.settings.themes.edit');
    });

    Route::controller(InquiriesController::class)->prefix('inquiries')->group(function () {
        Route::get('', 'index')->name('enclaves.admin.inquiries.index');

        Route::get('view/{id}', 'view')->name('enclaves.admin.inquiries.view');

        Route::post('', 'store')->name('enclaves.admin.inquiries.store');

        Route::post('update/{id}', 'update')->name('enclaves.admin.inquiries.update');

        Route::get('delete/{id}', 'destroy')->name('enclaves.admin.inquiries.destroy');

        Route::post('mass-delete', 'massDestroy')->name('enclaves.admin.inquiries.mass-destroy');
    });
});
