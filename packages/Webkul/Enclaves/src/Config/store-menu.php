<?php

return [
    [
        'key'   => 'account',
        'name'  => 'enclaves::app.shop.layouts.my-account',
        'route' => 'enclaves.customers.account.dashboard.index',
        'icon'  => '',
        'sort'  => 1,
    ], [
        'key'   => 'account.dashboard',
        'name'  => 'enclaves::app.shop.layouts.dashboard',
        'route' => 'enclaves.customers.account.dashboard.index',
        'icon'  => 'icon-dashboard',
        'sort'  => 1,
    ], [
        'key'   => 'account.profile',
        'name'  => 'enclaves::app.shop.layouts.profile',
        'route' => 'shop.customers.account.profile.index',
        'icon'  => 'icon-users',
        'sort'  => 1,
    ], [
        'key'   => 'account.documents',
        'name'  => 'enclaves::app.shop.layouts.documents',
        'route' => 'enclaves.customers.account.documents.index',
        'icon'  => 'icon-dashboard',
        'sort'  => 2,
    ], [
        'key'   => 'account.inquiries',
        'name'  => 'enclaves::app.shop.layouts.inquiries',
        'route' => 'enclaves.customers.account.inquiries.index',
        'icon'  => 'icon-dashboard',
        'sort'  => 2,
    ], [
        'key'   => 'account.transactions',
        'name'  => 'enclaves::app.shop.layouts.transactions',
        'route' => 'shop.customers.account.transactions.index',
        'icon'  => 'icon-orders',
        'sort'  => 2,
    ], [
        'key'   => 'account.home-seminar',
        'name'  => 'enclaves::app.shop.layouts.help-seminar',
        'route' => 'enclaves.customers.account.help-seminar.index',
        'icon'  => 'icon-orders',
        'sort'  => 2,
    ],
];
