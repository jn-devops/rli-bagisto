<?php

namespace Webkul\Enclaves\Http\Controllers\Customer\Account;

use Webkul\Enclaves\Http\Controllers\Controller;

class AbstractController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(
    ) {
    }

    /**
     * Get Customer Id
     */
    protected function customerId(): int
    {
        return auth()->guard('customer')->user()->id;
    }

    /**
     * Get Logged Customer Id
     */
    protected function customer(): mixed
    {
        return auth()->guard('customer')->user();
    }
}
