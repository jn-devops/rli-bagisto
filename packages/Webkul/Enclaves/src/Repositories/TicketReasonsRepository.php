<?php

namespace Webkul\Enclaves\Repositories;

use Webkul\Core\Eloquent\Repository;
use Webkul\Enclaves\Models\TicketReasons;

class TicketReasonsRepository extends Repository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return TicketReasons::class;
    }
}
