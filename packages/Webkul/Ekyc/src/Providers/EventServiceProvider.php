<?php

namespace Webkul\Ekyc\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Webkul\Ekyc\Listeners\EkycListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen('bagisto.admin.cms.pages.edit.card.accordion.seo.after', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('enclaves::admin.cms.edit.index');
        });

        Event::listen('bagisto.admin.cms.pages.create.card.accordion.general.after', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('enclaves::admin.cms.create.index');
        });

        Event::listen('catalog.product.update.after', function ($page) {
            app(EkycListener::class)->afterUpdate($page);
        });

        Event::listen('cms.page.update.after', function ($page) {
            app(EkycListener::class)->afterPageUpdateCreate($page);
        });

        Event::listen('cms.page.create.after', function ($page) {
            app(EkycListener::class)->afterPageUpdateCreate($page);
        });
    }
}
