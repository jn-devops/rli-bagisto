<?php

namespace Webkul\KrayinConnector\Hooks;

use Illuminate\Http\Request;
use Spatie\WebhookClient\WebhookProfile\WebhookProfile;

class KrayinProfile implements WebhookProfile
{
    /**
     * Is profile valid.
     */
    public function shouldProcess(Request $request): bool
    {
        return true;
    }
}
