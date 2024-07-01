<?php

namespace Webkul\GoogleShoppingFeed\Providers;

use Konekt\Concord\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        \Webkul\GoogleShoppingFeed\Models\MapGoogleProductAttribute::class,
        \Webkul\GoogleShoppingFeed\Models\MapGoogleCategory::class,
        \Webkul\GoogleShoppingFeed\Models\OAuthAccessToken::class,
        \Webkul\GoogleShoppingFeed\Models\ExportedProduct::class,
    ];
}