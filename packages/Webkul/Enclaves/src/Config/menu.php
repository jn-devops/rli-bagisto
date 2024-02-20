<?php

return [
    [
        'key'   => 'account.dashboard',
        'name'  => 'shop::app.layouts.dashboard',
        'route' => 'enclaves.customers.account.dashboard.index',
        'icon'  => 'icon-dashboard',
        'sort'  => 1,
    ], [
        'key'   => 'account.profile',
        'name'  => 'shop::app.layouts.profile',
        'route' => 'shop.customers.account.profile.index',
        'icon'  => 'icon-users',
        'sort'  => 1,
    ], [
        'key'   => 'account.documents',
        'name'  => 'shop::app.layouts.documents',
        'route' => 'enclaves.customers.account.documents.index',
        'icon'  => 'icon-dashboard',
        'sort'  => 2,
    ], [
        'key'   => 'account.inquiries',
        'name'  => 'shop::app.layouts.inquiries',
        'route' => 'enclaves.customers.account.inquiries.index',
        'icon'  => 'icon-dashboard',
        'sort'  => 2,
    ],
];