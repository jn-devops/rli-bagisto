<?php

namespace Webkul\BulkUpload\Listeners;

use Webkul\BulkUpload\Helpers\AccountCreater;
use Webkul\BulkUpload\Helpers\EkycVerificationCreateOrUpdate;

class AccountListener
{
    /**
     * store account.
     *
     * @param  array  $payload
     * @return void
     */
    public function afterCreate($payload)
    {
        /**
         * Account Create Process
         */
        app(AccountCreater::class)->create($payload);
    }
}
