<?php

return [
    [
        'key'   => 'google_feed',
        'name'  => 'google_feed::app.admin.layouts.google-feed',
        'route' => 'google_feed.account.auth',
        'icon'  => 'icon1-google-shopping-feed',
        'sort'  => 3,
    ], [
        'key'   => 'google_feed.auth',
        'name'  => 'google_feed::app.admin.layouts.settings.auth',
        'route' => 'google_feed.account.auth',
        'sort'  => 1,
    ], [
        'key'   => 'google_feed.attribute',
        'name'  => 'google_feed::app.admin.layouts.attribute',
        'route' => 'google_feed.attribute.index',
        'sort'  => 2,
    ], [
        'key'   => 'google_feed.category',
        'name'  => 'google_feed::app.admin.layouts.category',
        'route' => 'google_feed.category.index',
        'sort'  => 3,
    ], [
        'key'   => 'google_feed.product',
        'name'  => 'google_feed::app.admin.layouts.product',
        'route' => 'google_feed.products.export.index',
        'sort'  => 4,
    ],
];