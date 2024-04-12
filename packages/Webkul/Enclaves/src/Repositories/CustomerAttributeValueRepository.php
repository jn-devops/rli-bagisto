<?php

namespace Webkul\Enclaves\Repositories;

use Webkul\Core\Eloquent\Repository;
use Webkul\Enclaves\Contracts\CustomerAttributeValue;

class CustomerAttributeValueRepository extends Repository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return CustomerAttributeValue::class;
    }
}
