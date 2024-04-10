<?php

Route::group([
    'prefix'     => 'category',
    'middleware' => ['web', 'theme', 'locale', 'currency'],
], function () {

    Route::get('/', 'RLI\Category\Http\Controllers\Shop\CategoryController@index')->defaults('_config', [
        'view' => 'category::shop.index',
    ])->name('shop.category.index');

});
