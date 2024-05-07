<?php

namespace Webkul\Enclaves\Http\Controllers\Customer\Account;

class HelpSeminarController extends AbstractController
{
    /**
     * Create a new controller instance.
     */
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
        return redirect()->away(env('HELP_SEMINAR'));
    }
}
