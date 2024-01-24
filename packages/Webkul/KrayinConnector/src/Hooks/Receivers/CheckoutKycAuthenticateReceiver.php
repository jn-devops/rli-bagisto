<?php

namespace Webkul\KrayinConnector\Hooks\Receivers;

use Webkul\BulkUpload\Listeners\PaymentsListener;


class CheckoutKycAuthenticateReceiver
{
    /**
     * Create account.
     *
     * @param  array  $payload
     * @return void
     */
    public static function create(array $payload)
    {
        app(PaymentsListener::class)->payments($payload);
    }
}
