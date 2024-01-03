<?php

namespace Webkul\KrayinConnector\Hooks\Receivers;

use Illuminate\Support\Facades\Log;
use Webkul\Product\Repositories\ProductRepository;

class ProductReceiver
{
    /**
     * Create account.
     *
     * @param  array  $payload
     * @return void
     */
    public static function create(array $payload)
    {
        Log::info($payload);
    }
}
