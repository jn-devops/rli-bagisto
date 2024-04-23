<?php

namespace Webkul\Enclaves\Repositories;

use Webkul\Core\Eloquent\Repository;

class TicketStatusRepository extends Repository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return 'Webkul\Enclaves\Contracts\TicketStatus';
    }
}