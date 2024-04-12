<?php

namespace Webkul\Blog\Providers;

use Konekt\Concord\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        \Webkul\Blog\Models\Blog::class,
        \Webkul\Blog\Models\Category::class,
        \Webkul\Blog\Models\Tag::class,
        \Webkul\Blog\Models\Comment::class,
    ];
}
