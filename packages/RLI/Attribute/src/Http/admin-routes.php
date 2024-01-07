<?php

Route::group([
        'prefix'        => 'admin/attribute',
        'middleware'    => ['web', 'admin']
    ], function () {

        Route::get('', 'RLI\Attribute\Http\Controllers\Admin\AttributeController@index')->defaults('_config', [
            'view' => 'attribute::admin.index',
        ])->name('admin.attribute.index');

});