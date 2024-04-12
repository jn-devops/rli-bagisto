<?php

namespace Webkul\Enclaves\Http\Controllers\Customer\Account;

use Webkul\Enclaves\Http\Controllers\Controller;

class DocumentsController extends Controller
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
        return view('shop::customers.account.documents.index');
    }
}
