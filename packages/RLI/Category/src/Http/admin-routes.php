<?php

Route::group([
    'prefix'        => 'admin/category',
    'middleware'    => ['web', 'admin'],
], function () {

    Route::get('', 'RLI\Category\Http\Controllers\Admin\CategoryController@index')->defaults('_config', [
        'view' => 'category::admin.index',
    ])->name('admin.category.index');

});
