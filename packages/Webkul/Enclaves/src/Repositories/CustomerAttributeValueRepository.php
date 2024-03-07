<?php

namespace Webkul\Enclaves\Repositories;

use Webkul\Core\Eloquent\Repository;
use Webkul\Enclaves\Contracts\CustomerAttributeValue;

class CustomerAttributeValueRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return CustomerAttributeValue::class;
    }
}