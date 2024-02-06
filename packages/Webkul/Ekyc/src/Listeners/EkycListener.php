<?php

namespace Webkul\Ekyc\Listeners;

use Webkul\Ekyc\Helpers\EkycVerificationCreateOrUpdate;

class EkycListener
{
    /**
     * store ekyc details.
     *
     * @param  array  $payload
     * @return void
     */
    public function afterCreate($payload)
    {
        /**
         * Ekyc processing
         */
        app(EkycVerificationCreateOrUpdate::class)->create($payload);
    }
}