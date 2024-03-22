<?php

use Illuminate\Support\Facades\Route;
use Webkul\Enclaves\Http\Controllers\Admin\ThemeController;
use Webkul\Enclaves\Http\Controllers\Admin\InquiriesController;

/**
 * Settings routes. 
 */
Route::group(['middleware' => ['admin'], 'prefix' => config('app.admin_url')], function () {  

    // Over ride route
    Route::controller(ThemeController::class)->group(function () {
        Route::get('settings/themes/edit/{id}', 'edit')->name('admin.settings.themes.edit');
    });

    Route::controller(InquiriesController::class)->prefix('inquiries')->group(function () {
        Route::get('', 'index')->name('enclaves.admin.inquiries.edit');

        Route::post('', 'store')->name('enclaves.admin.inquiries.store');

        Route::put('', 'distory')->name('enclaves.admin.inquiries.distory');

    });
});
