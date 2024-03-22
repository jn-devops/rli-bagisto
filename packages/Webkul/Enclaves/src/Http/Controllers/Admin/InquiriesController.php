<?php

namespace Webkul\Enclaves\Http\Controllers\Admin;

use Webkul\Enclaves\Http\Controllers\Controller;

class InquiriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * List of Inquiries
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('enclaves::admin.inquiries.index');
    }

    /**
     * Edit Inquiries
     */
    public function edit()
    {
        
    }

    /**
     * Edit Inquiries
     */
    public function store()
    {

    }

    /**
     * Update Inquiries
     */
    public function update()
    {
        
    }

    /**
     * Delere Inquiries
     */
    public function destroy()
    {
        
    }

    /**
     * mass Delere Inquiries
     */
    public function massDestroy()
    {
        
    }
}