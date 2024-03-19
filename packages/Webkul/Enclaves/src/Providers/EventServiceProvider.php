<?php

namespace Webkul\Enclaves\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
/**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'checkout.cart.collect.totals.after'  => [
            'Webkul\Enclaves\Listeners\Cart@afterCreate',
        ],
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen('bagisto.admin.setting.theme.edit.form.images.before', function($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('enclaves::admin.components.image.index');
        });
    }
}
