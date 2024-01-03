<?php

namespace Webkul\BulkUpload\Repositories;

use Webkul\Core\Eloquent\Repository;

class ImportProductRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'Webkul\BulkUpload\Contracts\ImportProduct';
    }
}
