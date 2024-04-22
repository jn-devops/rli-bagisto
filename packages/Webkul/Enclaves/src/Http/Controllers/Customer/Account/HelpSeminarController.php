<?php

namespace Webkul\Enclaves\Http\Controllers\Customer\Account;

class HelpSeminarController extends AbstractController
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
        return view('shop::customers.account.help-seminar.index');
    }
}
