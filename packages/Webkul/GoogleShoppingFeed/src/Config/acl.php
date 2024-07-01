<?php

return [
    [
        'key'   => 'google_feed',
        'name'  => 'google_feed::app.acl.google-feed',
        'route' => 'google_feed.account.auth',
        'icon'  => 'icon1-google-shopping-feed',
        'sort'  => 3,
    ], [
        'key'   => 'google_feed.auth',
        'name'  => 'google_feed::app.acl.auth',
        'route' => 'google_feed.account.auth',
        'sort'  => 1,
    ], [
        'key'   => 'google_feed.auth.refresh_token',
        'name'  => 'google_feed::app.acl.refresh',
        'route' => 'google_feed.account.authenticate.refresh',
        'sort'  => 1,
    ], [
        'key'   => 'google_feed.attribute',
        'name'  => 'google_feed::app.acl.attribute',
        'route' => 'google_feed.attribute.index',
        'sort'  => 2,
    ], [
        'key'   => 'google_feed.attribute.refresh',
        'name'  => 'google_feed::app.acl.refresh',
        'route' => 'google_feed.attribute.index.refresh',
        'sort'  => 1,
    ], [
        'key'   => 'google_feed.category',
        'name'  => 'google_feed::app.acl.category',
        'route' => 'google_feed.category.index',
        'sort'  => 3,
    ], [
        'key'   => 'google_feed.category.create',
        'name'  => 'google_feed::app.acl.create',
        'route' => 'google_feed.category.map.create',
        'sort'  => 3,
    ], [
        'key'   => 'google_feed.category.destroy',
        'name'  => 'google_feed::app.acl.destroy',
        'route' => 'google_feed.category.mass_delete',
        'sort'  => 1,
    ], [
        'key'   => 'google_feed.product',
        'name'  => 'google_feed::app.acl.product',
        'route' => 'google_feed.products.export.index',
        'sort'  => 4,
    ], [
        'key'   => 'google_feed.product.export',
        'name'  => 'google_feed::app.acl.export',
        'route' => 'google_feed.products.export',
        'sort'  => 1,
    ],
];