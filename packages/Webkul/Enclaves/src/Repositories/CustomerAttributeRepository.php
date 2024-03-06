<?php

namespace Webkul\Enclaves\Repositories;

use Webkul\Core\Eloquent\Repository;
use Webkul\Enclaves\Contracts\CustomerAttribute;

class CustomerAttributeRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return CustomerAttribute::class;
    }
}