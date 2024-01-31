<?php

namespace Webkul\KrayinConnector\Hooks\Receivers;

use Webkul\Ekyc\Listeners\EkycListener;
use Webkul\BulkUpload\Listeners\AccountListener;

class eKycReceiver
{
    /**
     * Create account.
     *
     * @param  array  $payload
     * @return void
     */
    public static function create(array $payload)
    {
        /**
         * Processing Account Creation
         */
        app(AccountListener::class)->afterCreate($payload);

        /**
         * storing Kyc Details
         */
        app(EkycListener::class)->afterCreate($payload);
    }
}
