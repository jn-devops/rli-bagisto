<?php

namespace Webkul\BulkUpload\Http\Controllers\Shop;

use Illuminate\Http\JsonResponse;
use Webkul\Checkout\Facades\Cart;
use Illuminate\Support\Facades\Log;
use Webkul\Payment\Facades\Payment;
use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\BulkUpload\Listeners\PaymentsListener;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Shop\Http\Controllers\API\APIController;
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
        /**
         * process all product Ids
         */
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

    /**
     * Checking property valid via client api
     */
    public function verifingProperty()
    {
        $formData = request()->only([
            'code',
        ]);

        return new JsonResource([
            'request_data' => $formData,
            'data'         => $this->getSiteVerifyEndpoint(),
        ]);
    }

    /**
     * EndPoint URL
     */
    private function getSiteVerifyEndpoint() : string
    {
        $sku = "ABC-123";

        $transaction_id = "REF004";

        return "https://book-dev.enclaves.ph/auto-reserve/{$sku}/{$transaction_id}";
    }

    /**
     * kyc Response waiting.
     * 
     * @return Illuminate\Http\Resources\Json\JsonResource
     */
    public function kycResponse()
    {
        $paymentsListener = app(PaymentsListener::class)->response();

        Log::info($paymentsListener);
        
        return new JsonResource([
            'status' => false,
            'data'   => $paymentsListener,
        ]);
    }
}
