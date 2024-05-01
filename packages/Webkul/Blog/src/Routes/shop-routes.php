<?php

use Illuminate\Support\Facades\Route;
use Webkul\Blog\Http\Controllers\Shop\TagController;
use Webkul\Blog\Http\Controllers\Shop\BlogController;
use Webkul\Blog\Http\Controllers\Shop\CommentController;
use Webkul\Blog\Http\Controllers\Shop\CategoryController;

Route::group(['middleware' => ['web', 'theme', 'locale', 'currency']], function () {
    Route::get('/blogs', [BlogController::class, 'index'])->name('shop.article.index');

    Route::group(['prefix' => 'blog'], function() {

        Route::controller(BlogController::class)->group(function () {
            Route::get('list', 'blogFrontEnd')->name('shop.blogs.front-end');

            Route::get('{slug}/{blog_slug?}', 'view')->name('shop.article.view');
        });

        Route::controller(TagController::class)->group(function () {
            Route::get('tag/{slug}', 'index')->name('shop.blog.tag.index');
        });

        Route::controller(CategoryController::class)->group(function () {
            Route::get('{slug}', 'index')->name('shop.blog.category.index');
        });

        Route::controller(CommentController::class)->group(function () {
            Route::post('api/v1/blog/comment/store', 'store')->name('shop.blog.comment.store');
        });
    });
});
