<?php

namespace Webkul\Enclaves\Http\Controllers\Admin\Product;

use Webkul\Enclaves\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
    ) {
    }

    /**
     * Read All URL and return image
     *
     * @param int
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        
    }

    /**
     * Read All URL and return image
     *
     * @param int
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        dd(request()->all());
    }
}
