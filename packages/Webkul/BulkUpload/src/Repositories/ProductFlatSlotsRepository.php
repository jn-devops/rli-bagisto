<?php

namespace Webkul\BulkUpload\Repositories;

use Webkul\Core\Eloquent\Repository;

class ProductFlatSlotsRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'Webkul\BulkUpload\Contracts\ProductFlatSlots';
    }
}
