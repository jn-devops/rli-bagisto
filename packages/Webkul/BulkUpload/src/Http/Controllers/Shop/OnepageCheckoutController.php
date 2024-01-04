<?php

namespace Webkul\BulkUpload\Http\Controllers\Shop;

use Illuminate\Http\JsonResponse;
use Webkul\Shop\Http\Controllers\API\APIController;
use Webkul\BulkUpload\Repositories\ProductPropertiesRepository;
use Webkul\Checkout\Facades\Cart;

class OnepageCheckoutController extends APIController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected ProductPropertiesRepository $productPropertiesRepository,
    )
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $item = Cart::getCart()->items->pluck('product_id')->toArray();

        return new JsonResponse([
            'flats' => $this->productPropertiesRepository->with('slots')->where(['product_id' => $item])->get(),
        ]);
    }


    public function property()
    {
        return new JsonResponse([
            'flats' => $this->productPropertiesRepository
                            ->with('slots')
                            ->where(['product_id' => request('product_id'), 'image_url' => request('imageUrl')])->get(),
        ]);
    }
}
