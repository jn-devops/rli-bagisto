<?php

use Illuminate\Support\Facades\Route;
use Webkul\Blog\Http\Controllers\Shop\BlogController;
use Webkul\Blog\Http\Controllers\Shop\TagController;
use Webkul\Blog\Http\Controllers\Shop\CategoryController;
use Webkul\Blog\Http\Controllers\Shop\API\Blogs\BlogController as ApiBlogController;
use Webkul\Blog\Http\Controllers\Shop\CommentController;

Route::group([
    'prefix'     => 'blog',
    'middleware' => ['web', 'theme', 'locale', 'currency'],
], function () {
    Route::get('/', [BlogController::class, 'index'])->name('shop.article.index');

    Route::get('/author/{id}', [BlogController::class, 'authorPage'])->name('shop.blog.author.index');

    Route::get('/{slug}/{blog_slug?}', [BlogController::class, 'view'])->name('shop.article.view');
  
    Route::get('/tag/{slug}', [TagController::class, 'index'])->name('shop.blog.tag.index');
    
    Route::get('/{slug}', [CategoryController::class, 'index'])->name('shop.blog.category.index');
});