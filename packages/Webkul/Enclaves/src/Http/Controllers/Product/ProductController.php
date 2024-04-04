<?php

namespace Webkul\Enclaves\Http\Controllers\Product;

use Illuminate\Http\JsonResponse;
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