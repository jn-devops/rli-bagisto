<?php

use Illuminate\Support\Facades\Route;
use Webkul\Blog\Http\Controllers\Admin\BlogController;
use Webkul\Blog\Http\Controllers\Admin\BlogCategoryController;
use Webkul\Blog\Http\Controllers\Admin\BlogTagController;
use Webkul\Blog\Http\Controllers\Admin\BlogCommentController;
use Webkul\Blog\Http\Controllers\Admin\BlogSettingController;

Route::group(['middleware' => ['web', 'admin'], 'prefix' => config('app.admin_url'). '/blog'], function () {

    /**
     * Admin blog routes
     */
    Route::get('', [BlogController::class, 'index'])->name('admin.blog.index');

    Route::get('create', [BlogController::class, 'create'])->name('admin.blog.create');

    Route::get('edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');

    Route::post('store', [BlogController::class, 'store'])->name('admin.blog.store');

    Route::post('update/{id}', [BlogController::class, 'update'])->name('admin.blog.update');

    Route::post('delete/{id}', [BlogController::class, 'destroy'])->name('admin.blog.delete');

    Route::post('massdelete', [BlogController::class, 'massDestroy'])->name('admin.blog.massdelete');

    /**
     * Admin blog category routes
     */
    Route::group(['prefix' => 'category'], function () {
        Route::get('', [BlogCategoryController::class, 'index'])->name('admin.blog.category.index');

        Route::get('create', [BlogCategoryController::class, 'create'])->name('admin.blog.category.create');

        Route::get('edit/{id}', [BlogCategoryController::class, 'edit'])->name('admin.blog.category.edit');

        Route::post('store', [BlogCategoryController::class, 'store'])->name('admin.blog.category.store');

        Route::post('update/{id}', [BlogCategoryController::class, 'update'])->name('admin.blog.category.update');

        Route::post('delete/{id}', [BlogCategoryController::class, 'destroy'])->name('admin.blog.category.delete');

        Route::post('massdelete', [BlogCategoryController::class, 'massDestroy'])->name('admin.blog.category.massdelete');
    });

    /**
     * Admin blog tag routes
     */
    Route::group(['prefix' => 'tag'], function () {
        Route::get('', [BlogTagController::class, 'index'])->name('admin.blog.tag.index');

        Route::get('create', [BlogTagController::class, 'create'])->name('admin.blog.tag.create');

        Route::get('edit/{id}', [BlogTagController::class, 'edit'])->name('admin.blog.tag.edit');

        Route::post('store', [BlogTagController::class, 'store'])->name('admin.blog.tag.store');

        Route::post('update/{id}', [BlogTagController::class, 'update'])->name('admin.blog.tag.update');

        Route::post('delete/{id}', [BlogTagController::class, 'destroy'])->name('admin.blog.tag.delete');

        Route::post('mass-delete', [BlogTagController::class, 'massDestroy'])->name('admin.blog.tag.massdelete');
    });

    /**
     * Admin blog comment routes
     */
    Route::group(['prefix' => 'comment'], function () {
        Route::get('', [BlogCommentController::class, 'index'])->name('admin.blog.comment.index');

        Route::get('edit/{id}', [BlogCommentController::class, 'edit'])->name('admin.blog.comment.edit');

        Route::post('update/{id}', [BlogCommentController::class, 'update'])->name('admin.blog.comment.update');

        Route::post('delete/{id}', [BlogCommentController::class, 'destroy'])->name('admin.blog.comment.delete');

        Route::post('mass-delete', [BlogCommentController::class, 'massDestroy'])->name('admin.blog.comment.massdelete');
    });

    /**
     * Admin blog setting routes
     */
    Route::group(['prefix' => 'setting'], function () {
        Route::get('', [BlogSettingController::class, 'index'])->name('admin.blog.setting.index');

        Route::post('store', [BlogSettingController::class, 'store'])->name('admin.blog.setting.store');
    });
});

/**
 * Admin blog API routes
 */
Route::group(['middleware' => ['web', 'admin'], 'prefix' => 'api/v1/admin'], function () {
    Route::get('blogs', [BlogController::class, 'gteBlogs'])->name('admin.blog.gteBlogs');
});