<?php

namespace Webkul\Ekyc\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\Ekyc\Http\Controllers\Controller;
use Webkul\Checkout\Repositories\CartRepository;
use Webkul\Product\Repositories\ProductRepository;

class MinCartController extends Controller
{
    /**
     * Create a new class instance.
     * 
     * @param  \Webkul\Checkout\Repositories\CartRepository  $cartRepository
     * @param  \Webkul\Product\Repositories\ProductRepository  $productRepository
     */
    public function __construct(
        protected CartRepository  $cartRepository,
        protected ProductRepository  $productRepository,
    ) {
    }

    /**
     * verify Url for verify profile.
     * 
     * @return \Illuminate\Http\Response
     */
    public function verifyUrl()
    {
        if (auth()->guard()->check()) {
            $cart = $this->cartRepository->with('items')->findOneWhere([
                    'customer_id' => auth()->guard()->user()->id,
                    'is_active'   => 1,
                ]);
        } elseif (session()->has('cart')) {
            $cart = $this->cartRepository->with('items')->find(session()->get('cart')->id);
        }

        $productSlug = '';

        if($cart) {
            $productSlug = Str::slug(strtolower($cart->items->first()->name));

            return new JsonResource([
                'ekyc_redirect' => route('ekyc.verification.index', [
                                        'slug'   => $productSlug,
                                        'cartId' => $cart->id,
                                    ]),
            ]);
        }
    
        return new JsonResource([
            'ekyc_redirect' => null,
        ]);
    }
}