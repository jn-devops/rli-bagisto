<?php

namespace Webkul\Enclaves\Providers;

use Webkul\Core\Providers\CoreModuleServiceProvider;

class ModuleServiceProvider extends CoreModuleServiceProvider
{
    /**
     * Define the models
     *
     * @var array
     */
    protected $models = [
        \Webkul\Enclaves\Models\Tickets::class,
        \Webkul\Enclaves\Models\TicketReasons::class,
        \Webkul\Enclaves\Models\TicketStatus::class,
        \Webkul\Enclaves\Models\TicketFiles::class,
        \Webkul\Enclaves\Models\CustomerAttribute::class,
        \Webkul\Enclaves\Models\CustomerAttributeOption::class,
        \Webkul\Enclaves\Models\CustomerAttributeValue::class,
    ];
}