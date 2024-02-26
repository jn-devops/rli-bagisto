<?php

namespace Webkul\Enclaves\Http\Controllers\Product;

use Illuminate\Http\JsonResponse;
use Webkul\Enclaves\Http\Controllers\Controller;
use Webkul\Product\Repositories\ProductRepository;

class ProductController extends Controller
{
    /**
     */
    public function __construct(
        protected ProductRepository $productRepository,
    ) {
    }

    /**
     * Display a listing of the most View.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function mostViewProducts(): JsonResponse
    {
        $products = $this->productRepository->with('images')->offset(0)->limit(3)->orderBy('id', 'DESC')->get();

        return new JsonResponse([
            'products' => $products,
        ]);

    }
}