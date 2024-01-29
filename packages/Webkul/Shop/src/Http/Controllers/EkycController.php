<?php

namespace Webkul\Shop\Http\Controllers;

use Illuminate\Support\Str;
use Webkul\Product\Repositories\ProductRepository;

class EkycController extends Controller
{

    /**
     * \Webkul\Product\Repositories\ProductRepository $productRepository
     */
    public function __construct(
        protected ProductRepository $productRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if(empty(request('slug'))) {
            abort(404);
        }

        $slug = request('slug');

        $product = $this->productRepository->findBySlug($slug);

       // dd($product);

        return view('shop::checkout.ekyc.index', compact('product'));
    }
}
