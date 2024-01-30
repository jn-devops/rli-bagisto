<?php

namespace Webkul\BulkUpload\Repositories;

use Webkul\Core\Eloquent\Repository;

class EkycVerificationRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'Webkul\BulkUpload\Contracts\EkycVerification';
    }
}
