<?php

use Illuminate\Support\Facades\Route;
use Webkul\Blog\Http\Controllers\Admin\CategoryController;
use Webkul\Blog\Http\Controllers\Admin\CommentController;
use Webkul\Blog\Http\Controllers\Admin\PostController;
use Webkul\Blog\Http\Controllers\Admin\SettingController;
use Webkul\Blog\Http\Controllers\Admin\TagController;

Route::group(['middleware' => ['web', 'admin'], 'prefix' => config('app.admin_url') . '/blog'], function () {

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
     * Admin blog category routes
     */
    Route::controller(CategoryController::class)->prefix('category')->group(function () {
        Route::get('', 'index')->name('admin.blog.category.index');

        Route::get('create', 'create')->name('admin.blog.category.create');

        Route::get('edit/{id}', 'edit')->name('admin.blog.category.edit');

        Route::post('store', 'store')->name('admin.blog.category.store');

        Route::post('update/{id}', 'update')->name('admin.blog.category.update');

        Route::post('delete/{id}', 'destroy')->name('admin.blog.category.delete');

        Route::post('mass-delete', 'massDestroy')->name('admin.blog.category.mass-delete');
    });

    /**
     * Admin blog tag routes
     */
    Route::controller(TagController::class)->prefix('tag')->group(function () {
        Route::get('', 'index')->name('admin.blog.tag.index');

        Route::get('create', 'create')->name('admin.blog.tag.create');

        Route::get('edit/{id}', 'edit')->name('admin.blog.tag.edit');

        Route::post('store', 'store')->name('admin.blog.tag.store');

        Route::post('update/{id}', 'update')->name('admin.blog.tag.update');

        Route::post('delete/{id}', 'destroy')->name('admin.blog.tag.delete');

        Route::post('mass-delete', 'massDestroy')->name('admin.blog.tag.mass-delete');
    });

    /**
     * Admin blog comment routes
     */
    Route::controller(CommentController::class)->prefix('comment')->group(function () {
        Route::get('', 'index')->name('admin.blog.comment.index');

        Route::get('edit/{id}', 'edit')->name('admin.blog.comment.edit');

        Route::post('update/{id}', 'update')->name('admin.blog.comment.update');

        Route::post('delete/{id}', 'destroy')->name('admin.blog.comment.delete');

        Route::post('mass-delete', 'massDestroy')->name('admin.blog.comment.mass-delete');
    });

    /**
     * Admin blog setting routes
     */
    Route::controller(SettingController::class)->prefix('setting')->group(function () {
        Route::get('', 'index')->name('admin.blog.setting.index');

        Route::post('store', 'store')->name('admin.blog.setting.store');
    });
});