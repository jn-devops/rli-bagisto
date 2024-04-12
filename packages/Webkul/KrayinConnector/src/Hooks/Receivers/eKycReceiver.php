<?php

namespace Webkul\KrayinConnector\Hooks\Receivers;

use Webkul\Ekyc\Listeners\EkycListener;

class eKycReceiver
{
    /**
     * Create account.
     *
     * @return void
     */
    public static function create(array $payload)
    {
        /**
         * storing Kyc Details
         */
        app(EkycListener::class)->afterCreate($payload);
    }
}
