<?php

namespace Webkul\Enclaves\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
        'customer.registration.after' => [
            'Webkul\Enclaves\Listeners\Customer@afterCreate',
        ],
        'customer.update.after' => [
            'Webkul\Enclaves\Listeners\Customer@afterUpdate',
        ],
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen('bagisto.admin.setting.theme.edit.form.images.before', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('enclaves::admin.components.image.index');
        });

        Event::listen('bagisto.admin.customers.create.after', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('enclaves::admin.customers.form.create.index');
        });

        Event::listen('bagisto.admin.customers.customers.edit.after', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('enclaves::admin.customers.form.edit.index');
        });
    }
}
