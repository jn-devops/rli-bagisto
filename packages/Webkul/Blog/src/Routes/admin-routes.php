<?php

use Illuminate\Support\Facades\Route;
use Webkul\Blog\Http\Controllers\Admin\BlogController;
use Webkul\Blog\Http\Controllers\Admin\CategoryController;
use Webkul\Blog\Http\Controllers\Admin\CommentController;
use Webkul\Blog\Http\Controllers\Admin\SettingController;
use Webkul\Blog\Http\Controllers\Admin\TagController;

Route::group(['middleware' => ['web', 'admin'], 'prefix' => config('app.admin_url').'/blog'], function () {

    /**
     * Admin blog routes
     */
    Route::get('index', [BlogController::class, 'index'])->name('admin.blog.index');

    Route::get('create', [BlogController::class, 'create'])->name('admin.blog.create');

    Route::get('edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');

    Route::post('store', [BlogController::class, 'store'])->name('admin.blog.store');

    Route::post('update/{id}', [BlogController::class, 'update'])->name('admin.blog.update');

    Route::post('delete/{id}', [BlogController::class, 'destroy'])->name('admin.blog.delete');

    Route::post('massdelete', [BlogController::class, 'massDestroy'])->name('admin.blog.massdelete');

    /**
     * Admin blog category routes
     */
    Route::prefix('category')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('admin.blog.category.index');

        Route::get('create', [CategoryController::class, 'create'])->name('admin.blog.category.create');

        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('admin.blog.category.edit');

        Route::post('store', [CategoryController::class, 'store'])->name('admin.blog.category.store');

        Route::post('update/{id}', [CategoryController::class, 'update'])->name('admin.blog.category.update');

        Route::post('delete/{id}', [CategoryController::class, 'destroy'])->name('admin.blog.category.delete');

        Route::post('massdelete', [CategoryController::class, 'massDestroy'])->name('admin.blog.category.massdelete');
    });

    /**
     * Admin blog tag routes
     */
    Route::prefix('tag')->group(function () {
        Route::get('', [TagController::class, 'index'])->name('admin.blog.tag.index');

        Route::get('create', [TagController::class, 'create'])->name('admin.blog.tag.create');

        Route::get('edit/{id}', [TagController::class, 'edit'])->name('admin.blog.tag.edit');

        Route::post('store', [TagController::class, 'store'])->name('admin.blog.tag.store');

        Route::post('update/{id}', [TagController::class, 'update'])->name('admin.blog.tag.update');

        Route::post('delete/{id}', [TagController::class, 'destroy'])->name('admin.blog.tag.delete');

        Route::post('massdelete', [TagController::class, 'massDestroy'])->name('admin.blog.tag.massdelete');
    });

    /**
     * Admin blog comment routes
     */
    Route::prefix('comment')->group(function () {
        Route::get('', [CommentController::class, 'index'])->name('admin.blog.comment.index');

        Route::get('edit/{id}', [CommentController::class, 'edit'])->name('admin.blog.comment.edit');

        Route::post('update/{id}', [CommentController::class, 'update'])->name('admin.blog.comment.update');

        Route::post('delete/{id}', [CommentController::class, 'destroy'])->name('admin.blog.comment.delete');

        Route::post('massdelete', [CommentController::class, 'massDestroy'])->name('admin.blog.comment.massdelete');
    });

    /**
     * Admin blog setting routes
     */
    Route::prefix('setting')->group(function () {
        Route::get('', [SettingController::class, 'index'])->name('admin.blog.setting.index');

        Route::post('store', [SettingController::class, 'store'])->name('admin.blog.setting.store');
    });
});

