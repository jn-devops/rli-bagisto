<?php

use Illuminate\Support\Facades\Route;
use Webkul\Blog\Http\Controllers\Admin\PostController;
use Webkul\Blog\Http\Controllers\Admin\SettingController;

Route::group(['middleware' => ['web', 'admin', 'blog'], 'prefix' => config('app.admin_url') . '/blog'], function () {
    /**
     * Admin blog routes
     */
    Route::controller(PostController::class)->prefix('posts')->group(function () {
        Route::get('', 'index')->name('admin.blog.index');

        Route::get('create', 'create')->name('admin.blog.create');

        Route::get('edit/{id}', 'edit')->name('admin.blog.edit');

        Route::post('store', 'store')->name('admin.blog.store');

        Route::post('update/{id}', 'update')->name('admin.blog.update');

        Route::post('delete/{id}', 'destroy')->name('admin.blog.delete');

        Route::post('mass-delete', 'massDestroy')->name('admin.blog.mass-delete');
    });

    /**
     * Admin blog setting routes
     */
    Route::controller(SettingController::class)->prefix('setting')->group(function () {
        Route::get('', 'index')->name('admin.blog.setting.index');

        Route::post('store', 'store')->name('admin.blog.setting.store');
    });
});