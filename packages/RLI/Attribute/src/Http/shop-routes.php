<?php

Route::group([
    'prefix'     => 'attribute',
    'middleware' => ['web', 'theme', 'locale', 'currency'],
], function () {

    Route::get('/', 'RLI\Attribute\Http\Controllers\Shop\AttributeController@index')->defaults('_config', [
        'view' => 'attribute::shop.index',
    ])->name('shop.attribute.index');

});
