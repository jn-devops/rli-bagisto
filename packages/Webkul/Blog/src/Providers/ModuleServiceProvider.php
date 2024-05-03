<?php

namespace Webkul\Blog\Providers;

use Konekt\Concord\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        \Webkul\Blog\Models\Blog::class,
    ];
}
