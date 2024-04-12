<?php

use Illuminate\Support\Facades\Route;
use Webkul\Blog\Http\Controllers\Shop\TagController;
use Webkul\Blog\Http\Controllers\Shop\BlogController;
use Webkul\Blog\Http\Controllers\Shop\CommentController;
use Webkul\Blog\Http\Controllers\Shop\CategoryController;

Route::group(['middleware' => ['web', 'theme', 'locale', 'currency']], function () {
    Route::get('/blogs', [BlogController::class, 'index'])->name('shop.article.index');


    Route::group(['prefix' => 'blog'], function() {
        Route::get('list', [BlogController::class, 'blogFrontEnd'])->name('shop.blogs.front-end');

        Route::get('author/{id}', [BlogController::class, 'authorPage'])->name('shop.blog.author.index');

        Route::get('{slug}/{blog_slug?}', [BlogController::class, 'view'])->name('shop.article.view');

        Route::get('tag/{slug}', [TagController::class, 'index'])->name('shop.blog.tag.index');

        Route::get('{slug}', [CategoryController::class, 'index'])->name('shop.blog.category.index');

        Route::post('api/v1/blog/comment/store', [CommentController::class, 'store'])->name('shop.blog.comment.store');
    });
});
