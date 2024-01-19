<?php

namespace Webkul\BulkUpload\Http\Controllers\Shop;

use Illuminate\Http\JsonResponse;
use Webkul\Checkout\Facades\Cart;
use Webkul\Shop\Http\Controllers\API\APIController;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\BulkUpload\Repositories\ProductPropertiesRepository;

class OnepageCheckoutController extends APIController
{
    /**
     * Create a new controller instance.
     *
     * \Webkul\BulkUpload\Repositories\ProductPropertiesRepository $productPropertiesRepository
     * \Webkul\Product\Repositories\ProductRepository $productRepository
     * 
     * @return void
     */
    public function __construct(
        protected ProductPropertiesRepository $productPropertiesRepository,
        protected ProductRepository $productRepository,
    )
    {
    }

    /**
     * Fetch properties on image.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // process all product Ids
        $item = Cart::getCart()->items->pluck('product_id')->toArray();

        $products = $this->productRepository->with('variants')->findWhereIn('id', $item);

        return new JsonResponse([
            'flats' => $products->map( function ($product) {
                        return $this->productPropertiesRepository
                            ->with('slots')
                            ->findWhereIn('product_id', $product->pluck('id')->toArray());
                }),
        ]);
    }

    /**
     * Fetch slot on image
     * 
     * @return \Illuminate\Http\Response
     */
    public function property()
    {
        return new JsonResponse([
            'slots' => $this->productPropertiesRepository
                            ->with('slots')
                            ->where(['product_id' => request('product_id'), 'image_url' => request('imageUrl')])->get(),
        ]);
    }
}
