<?php

namespace Webkul\Enclaves\Http\Controllers\Shop\Checkout;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\BulkUpload\Repositories\ProductPropertiesRepository;
use Webkul\Checkout\Facades\Cart;
use Webkul\Payment\Facades\Payment;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Shop\Http\Controllers\API\APIController;

class OnePageCheckoutController extends APIController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected ProductPropertiesRepository $productPropertiesRepository,
        protected ProductRepository $productRepository,
    ) {
    }

    /**
     * Fetch properties on image.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * process all product Ids
         */
        $item = Cart::getCart()->items->pluck('product_id')->toArray();

        $products = $this->productRepository->with('variants')->findWhereIn('id', $item);

        return new JsonResponse([
            'flats' => $products->map(function ($product) {
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
                ->where([
                    'product_id' => request('product_id'),
                    'image_url'  => request('imageUrl'),
                ])->get(),
        ]);
    }

    /**
     * Store customer authentication.
     */
    public function authentication(): JsonResource
    {
        if (
            ! auth()->guard('customer')->check()
            && ! Cart::getCart()->hasGuestCheckoutItems()
        ) {
            return new JsonResource([
                'redirect' => true,
                'data'     => route('shop.customer.session.index'),
            ]);
        }

        return new JsonResource([
            'redirect' => false,
            'data'     => Payment::getSupportedPaymentMethods(),
        ]);
    }
}
