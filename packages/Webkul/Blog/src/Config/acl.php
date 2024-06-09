<?php

return [
    [
        'key'   => 'blog',
        'name'  => 'blog::app.config.acl.title',
        'route' => 'admin.blog.index',
        'sort'  => 2,
    ], [
        'key'   => 'blog.post',
        'name'  => 'blog::app.config.acl.post',
        'route' => 'admin.blog.index',
        'sort'  => 1,
    ], [
        'key'   => 'blog.post.create',
        'name'  => 'blog::app.config.acl.add',
        'route' => 'admin.blog.create',
        'sort'  => 1,
    ], [
        'key'   => 'blog.post.edit',
        'name'  => 'blog::app.config.acl.edit',
        'route' => 'admin.blog.edit',
        'sort'  => 2,
    ], [
        'key'   => 'blog.post.delete',
        'name'  => 'blog::app.config.acl.delete',
        'route' => 'admin.blog.delete',
        'sort'  => 3,
    ], [
        'key'   => 'blog.settings',
        'name'  => 'blog::app.config.acl.setting',
        'route' => 'admin.blog.setting.index',
        'sort'  => 2,
    ],
];
