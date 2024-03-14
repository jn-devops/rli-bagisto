<?php

use Illuminate\Support\Facades\Route;
use Webkul\Enclaves\Http\Controllers\Admin\ThemeController;

/**
 * Settings routes. 
 */
Route::group(['middleware' => ['admin'], 'prefix' => config('app.admin_url')], function () {  

    Route::controller(ThemeController::class)->group(function () {
  
        Route::get('settings/themes/edit/{id}', 'edit')->name('admin.settings.themes.edit');
    });
});
