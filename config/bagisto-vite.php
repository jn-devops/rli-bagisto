<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Bagisto Vite Configuration
    |--------------------------------------------------------------------------
    |
    | Please add your Vite registry here to seamlessly support the `bagisto_assets` function.
    |
    */

    'viters' => [
        'admin' => [
            'hot_file'                 => 'admin-default-vite.hot',
            'build_directory'          => 'themes/admin/default/build',
            'package_assets_directory' => 'src/Resources/assets',
        ],

        'bulk' => [
            'hot_file'                 => 'admin-bulk-vite.hot',
            'build_directory'          => 'themes/admin/bulk/build',
            'package_assets_directory' => 'src/Resources/assets',
        ],

        'shop' => [
            'hot_file'                 => 'shop-default-vite.hot',
            'build_directory'          => 'themes/shop/default/build',
            'package_assets_directory' => 'src/Resources/assets',
        ],

        'installer' => [
            'hot_file'                 => 'installer-default-vite.hot',
            'build_directory'          => 'themes/installer/default/build',
            'package_assets_directory' => 'src/Resources/assets',
        ],

        'blog' => [
            'hot_file'                 => 'blog-vite.hot',
            'build_directory'          => 'themes/blog/default/build',
            'package_assets_directory' => 'src/Resources/assets',
        ],

        'google_feed' => [
            'hot_file'                 => 'google-feed-default-vite.hot',
            'build_directory'          => 'themes/google_feed/default/build',
            'package_assets_directory' => 'src/Resources/assets',
        ],
    ],
];
