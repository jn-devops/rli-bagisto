<?php

namespace Webkul\Enclaves\Repositories;

use Webkul\Core\Eloquent\Repository;
use Webkul\Enclaves\Contracts\TicketStatus;

class TicketStatusRepository extends Repository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return TicketStatus::class;
    }
}
