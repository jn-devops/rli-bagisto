<?php

namespace Webkul\CustomizShop\Http\Controllers;

use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\CustomizShop\Http\Controllers\Controller;

class DashboardController extends Controller
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
        return view('shop::customers.account.dashboard.index');
    }
}