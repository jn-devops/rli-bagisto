<?php

namespace Webkul\Enclaves\Repositories;

use Webkul\Core\Eloquent\Repository;

class TicketStatusRepository extends Repository
{
    /**
     * Create a new repository instance.
     */
    public function __construct(
    )
    {
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return 'Webkul\Enclaves\Contracts\TicketStatus';
    }
}