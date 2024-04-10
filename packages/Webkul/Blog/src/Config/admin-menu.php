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
        'key'   => 'blog.category',
        'name'  => 'blog::app.config.admin-menu.categories',
        'route' => 'admin.blog.category.index',
        'sort'  => 2,
        'icon'  => '',
    ], [
        'key'   => 'blog.tag',
        'name'  => 'blog::app.config.admin-menu.tags',
        'route' => 'admin.blog.tag.index',
        'sort'  => 3,
        'icon'  => '',
    ], [
        'key'   => 'blog.comment',
        'name'  => 'blog::app.config.admin-menu.comments',
        'route' => 'admin.blog.comment.index',
        'sort'  => 4,
        'icon'  => '',
    ], [
        'key'   => 'blog.setting',
        'name'  => 'blog::app.config.admin-menu.setting',
        'route' => 'admin.blog.setting.index',
        'sort'  => 5,
        'icon'  => '',
    ],
];
