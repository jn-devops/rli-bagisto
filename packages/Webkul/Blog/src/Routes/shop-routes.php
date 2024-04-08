<?php
use Illuminate\Support\Facades\Route;
use Webkul\Blog\Http\Controllers\Shop\BlogController;
use Webkul\Blog\Http\Controllers\Shop\BlogTagController;
use Webkul\Blog\Http\Controllers\Shop\BlogCommentController;
use Webkul\Blog\Http\Controllers\Shop\BlogCategoryController;
use Webkul\Blog\Http\Controllers\Shop\API\Blogs\BlogAPIController;

Route::group([
    'prefix' => 'blog',
    'middleware' => ['web', 'theme', 'locale', 'currency']
], function () {
    Route::get('', [BlogController::class, 'index'])->name('shop.article.index');
    
    Route::get('/author/{id}', [BlogController::class, 'authorPage'])->name('shop.blog.author.index');

    Route::get('/{slug}/{blog_slug?}', [BlogController::class, 'view'])->name('shop.article.view');

    Route::get('/tag/{slug}', [BlogTagController::class, 'index'])->name('shop.blog.tag.index');

    Route::get('categories/{slug}', [BlogCategoryController::class,'categories'])->name('shop.blog.category.index');
});