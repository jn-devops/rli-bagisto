<?php

return [
    [
        'key'   => 'blog',
        'name'  => 'blog::app.config.admin-menu.title',
        'route' => 'admin.blog.index',
        'sort'  => 3,
        'icon'  => 'icon-cms',
    ], [
        'key'   => 'blog.blog',
        'name'  => 'blog::app.config.admin-menu.posts',
        'route' => 'admin.blog.index',
        'sort'  => 1,
        'icon'  => '',
    ], [
        'key'   => 'blog.setting',
        'name'  => 'blog::app.config.admin-menu.setting',
        'route' => 'admin.blog.setting.index',
        'sort'  => 5,
        'icon'  => '',
    ],
];
