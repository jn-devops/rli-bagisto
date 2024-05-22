<?php

namespace Webkul\Enclaves\Http\Controllers\Shop\Product;

use Illuminate\Http\JsonResponse;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Enclaves\Helpers\Customer\CustomerHelper;
use Webkul\Enclaves\Http\Controllers\Controller;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Marketing\Repositories\URLRewriteRepository;
use Webkul\Theme\Repositories\ThemeCustomizationRepository;
class ProductController extends Controller
{
    /**
     * Using const variable for status
     *
     * @var int Status
     */
    const STATUS = 1;
    
    public function __construct(
        protected ProductRepository $productRepository,
        protected CustomerRepository $customerRepository,
        protected CategoryRepository $categoryRepository,
        protected ThemeCustomizationRepository $themeCustomizationRepository,
        protected URLRewriteRepository $urlRewriteRepository
    ) {
    }

    public function index()
    {
        return view('enclaves::products-list.view', [
            'params'   => [
                'sort'  => request()->query('sort'),
                'limit' => request()->query('limit'),
                'mode'  => request()->query('mode'),
            ],
        ]);

        abort(404);
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
