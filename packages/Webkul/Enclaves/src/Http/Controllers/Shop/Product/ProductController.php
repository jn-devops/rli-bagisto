<?php

namespace Webkul\Enclaves\Http\Controllers\Shop\Product;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\Marketing\Jobs\UpdateCreateSearchTerm as UpdateCreateSearchTermJob;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Enclaves\Helpers\Customer\CustomerHelper;
use Webkul\Enclaves\Http\Controllers\Controller;
use Webkul\Product\Helpers\View as ProductViewHelper;
use Webkul\Enclaves\Http\Resources\ProductResource;
use Webkul\Enclaves\Repositories\ProductRepository as EnclaveProductRepository;

class ProductController extends Controller
{
    /**
     * Using const variable for status
     *
     * @var int Status
     */
    protected const STATUS = 1;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected ProductRepository $productRepository,
        protected ProductViewHelper $productViewHelper,
        protected EnclaveProductRepository $enclaveProductRepository,
    ) {}

    /**
     * Show the view for the specified resource.
     *
     * @return \Illuminate\View\View
     */
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

    /**
     * Product listings.
     */
    public function getProducts(): JsonResource
    {
        $products = $this->productRepository->getAll(request()->query());

        if (! empty(request()->query('query'))) {
            /**
             * Update or create search term only if
             * there is only one filter that is query param
             */
            if (count(request()->except(['mode', 'sort', 'limit'])) == 1) {
                UpdateCreateSearchTermJob::dispatch([
                    'term'       => request()->query('query'),
                    'results'    => $products->total(),
                    'channel_id' => core()->getCurrentChannel()->id,
                    'locale'     => app()->getLocale(),
                ]);
            }
        }

        foreach ($products as $product) {
            $product->attributes = $this->productViewHelper->getAdditionalData($product);
        }

        return ProductResource::collection($products);
    }

    /**
     * Product listings.
     */
    public function getSoldOutProducts(): JsonResource
    {
        $products = $this->enclaveProductRepository->getAllWithNoInventory(request()->query());

        if (! empty(request()->query('query'))) {
            /**
             * Update or create search term only if
             * there is only one filter that is query param
             */
            if (count(request()->except(['mode', 'sort', 'limit'])) == 1) {
                UpdateCreateSearchTermJob::dispatch([
                    'term'       => request()->query('query'),
                    'results'    => $products->total(),
                    'channel_id' => core()->getCurrentChannel()->id,
                    'locale'     => app()->getLocale(),
                ]);
            }
        }

        foreach ($products as $product) {
            $product->attributes = $this->productViewHelper->getAdditionalData($product);
        }

        return ProductResource::collection($products);
    }

    /**
     * Show the view for the ask to joy resources.
     *
     * @return \Illuminate\View\View
     */
    public function askToJoyProductsview()
    {
        return view('enclaves::shop.ask-to-joy.index');
    }

    public function getAskToJoyProducts()
    {
        $products = $this->enclaveProductRepository
            ->getAll(array_merge(request()->query(), [
                'channel_id'           => core()->getCurrentChannel()->id,
                'status'               => 1,
                'visible_individually' => 1,
            ]));

        foreach ($products as $product) {
            $product->attributes = $this->productViewHelper->getAdditionalData($product);
        }

        return response()->json([
            'data' => ProductResource::collection($products),
        ]);
    }
}
