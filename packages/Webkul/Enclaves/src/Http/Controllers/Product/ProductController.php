<?php

namespace Webkul\Enclaves\Http\Controllers\Product;

use Illuminate\Http\JsonResponse;
use Webkul\Product\Facades\ProductImage;
use Webkul\Enclaves\Http\Controllers\Controller;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Enclaves\Helpers\Customer\CustomerHelper;

class ProductController extends Controller
{
    /**
     */
    public function __construct(
        protected ProductRepository $productRepository,
        protected CustomerRepository $customerRepository,
    ) {
    }

    /**
     * Display a listing of the most View.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function mostViewProducts(): JsonResponse
    {
        $products = $this->productRepository->offset(0)->limit(3)->orderBy('id', 'DESC')->get();

        foreach($products as $index => $product) {
            $products[$index]['all_images'] = ProductImage::getProductBaseImage($product);
            $products[$index]['format_price'] = core()->currency($product->price);
        }
        
        return new JsonResponse([
            'products' => $products,
        ]);
    }
    
    /**
     * Profile Update
     */
    public function profileUpdate(): JsonResponse
    {
        $data = request()->all();

        app(CustomerHelper::class)->updateProfile($data);
        
        return new JsonResponse([
            'message' => trans('shop::app.customers.account.profile.edit-success'),
        ]);
    }
}