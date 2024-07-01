<?php

namespace Webkul\GoogleShoppingFeed\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Webkul\GoogleShoppingFeed\Helpers\GoogleShoppingContentApi;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\GoogleShoppingFeed\Repositories\MapGoogleProductAttributeRepository;

class ProductController extends Controller
{
    public function __construct(
        protected GoogleShoppingContentApi $googleShoppingContentApi,
        protected ProductRepository $productRepository,
        protected MapGoogleProductAttributeRepository $mapGoogleProductAttributeRepository,
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $productCount = $this->productRepository->count();

        return view('google_feed::admin.product.export')->with([
            'productCount' => $productCount,
        ]);
    }

    /**
     * Exports products to google shop.
     * 
     */
    public function export(): JsonResponse
    {
        $dataToBeReturn = array();

        $accessToken = $this->googleShoppingContentApi->getAccessToken();

        if (empty($accessToken)) {
            return new JsonResponse([
                'message' => trans('google_feed::app.admin.product.refresh'),
            ], 401);
        }

        if (! $this->mapGoogleProductAttributeRepository->first()) {
            return new JsonResponse([
                'message' => trans('google_feed::app.admin.product.map-attribute-failed'),
            ], 401);
        }

        try {
            $products = $this->productRepository->getAll();

            foreach ($products as $product) {
                if (
                    $product->type == 'virtual'
                    || $product->type == 'downloadable'
                ) {
                    continue;
                }

                $this->googleShoppingContentApi->exportProduct($product);
            }

            if ($products->lastPage() <= request()->input('page') - 1) {
                $dataToBeReturn = [
                    'allUploaded'   => true,
                    'productsCount' => request()->input('productCount'),
                ];
            } else {
                $dataToBeReturn = [
                    'productsCount'    => request()->input('productCount'),
                    'productsUploaded' => $products->count(),
                    'page'             => request()->input('page') + 1,
                    'allUploaded'      => false,
                ];
            }

            return new JsonResponse([
                'data'    => $dataToBeReturn,
                'message' => trans('google_feed::app.admin.product.export-success'),
            ], 200);
        } catch (\Exception $e) {
            return new JsonResponse([
                'message' => $e->getMessage(),
            ], 401);
        }
    }   
}
