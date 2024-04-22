<?php

namespace Webkul\Enclaves\Http\Controllers\Product;

use Illuminate\Http\JsonResponse;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Enclaves\Helpers\Customer\CustomerHelper;
use Webkul\Enclaves\Http\Controllers\Controller;
use Webkul\Product\Repositories\ProductRepository;

class ProductController extends Controller
{
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
        app(CustomerHelper::class)->updateProfile(request()->all());

        return new JsonResponse([
            'message' => trans('shop::app.customers.account.profile.edit-success'),
        ]);
    }
}
