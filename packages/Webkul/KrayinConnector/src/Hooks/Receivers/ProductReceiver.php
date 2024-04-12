<?php

namespace Webkul\KrayinConnector\Hooks\Receivers;

use Illuminate\Support\Facades\Log;

class ProductReceiver
{
    /**
     * Create account.
     *
     * @return void
     */
    public static function create(array $payload)
    {
        Log::info($payload);
    }
}
