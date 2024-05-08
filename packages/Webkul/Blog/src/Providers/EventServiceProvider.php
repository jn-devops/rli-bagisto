<?php

namespace Webkul\Blog\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen('bagisto.shop.layout.content.after', function ($viewRenderEventManager) {
            if(core()->getConfigData('blog.settings.general.status')) {
                $viewRenderEventManager->addTemplate('blog::shop.blog.post.layouts.index');
            }
        });
    }
}
