<?php

namespace Webkul\Enclaves\Http\Controllers;

use Webkul\Enclaves\Http\Controllers\Controller;

class InquiriesController extends Controller
{
    /**
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
        return view('shop::customers.account.inquire.index');
    }

    /**
     * Display all tickets in view
     * 
     * @return \Illuminate\View\View
     */
    public function tickets()
    {
        return view('shop::customers.account.inquire.tickets');
    }

    /**
     * Store Ticket
     * 
     * @return boolean
     */

    public function store()
    {
        dd(request()->all());
    }
}