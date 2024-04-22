<?php

namespace Webkul\Enclaves\Http\Controllers\Customer\Account;

class DashboardController extends AbstractController
{
    public function __construct(
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('shop::customers.account.dashboard.index');
    }
}
