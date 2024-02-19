<?php

namespace Webkul\Store\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'customer.registration.after' => [
            'Webkul\Store\Listeners\Customer@afterCreated',
        ],

        'customer.password.update.after' => [
            'Webkul\Store\Listeners\Customer@afterPasswordUpdated',
        ],

        'customer.subscription.after' => [
            'Webkul\Store\Listeners\Customer@afterSubscribed',
        ],

        'customer.note-created.after' => [
            'Webkul\Store\Listeners\Customer@afterNoteCreated',
        ],

        'checkout.order.save.after' => [
            'Webkul\Store\Listeners\Order@afterCreated',
        ],

        'sales.order.cancel.after' => [
            'Webkul\Store\Listeners\Order@afterCanceled',
        ],

        'sales.order.comment.create.after' => [
            'Webkul\Store\Listeners\Order@afterCommented',
        ],

        'sales.invoice.save.after' => [
            'Webkul\Store\Listeners\Invoice@afterCreated',
        ],

        'sales.shipment.save.after' => [
            'Webkul\Store\Listeners\Shipment@afterCreated',
        ],

        'sales.refund.save.after' => [
            'Webkul\Store\Listeners\Refund@afterCreated',
        ],
    ];
}
