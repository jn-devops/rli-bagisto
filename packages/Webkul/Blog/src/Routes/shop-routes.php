<?php

use Illuminate\Support\Facades\Route;
use Webkul\Blog\Http\Controllers\Shop\BlogController;

Route::group(['middleware' => ['web', 'theme', 'blog', 'locale', 'currency']], function () {
    Route::get('/blogs', [BlogController::class, 'index'])->name('shop.article.index');

    Route::group(['prefix' => 'blog'], function() {
        Route::controller(BlogController::class)->group(function () {
            Route::get('list', 'blogFrontEnd')->name('shop.blogs.front-end');

            Route::get('{blog_slug}', 'view')->name('shop.article.view');
        });
    });
});
