<?php

namespace Webkul\Enclaves\Http\Controllers\Shop\Ekyc;

use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\Enclaves\Http\Controllers\Controller;
use Webkul\Checkout\Repositories\CartRepository;

class EkycController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected CartRepository $cartRepository,
    ) {
    }

    /**
     * Get all categories.
     */
    public function index(): JsonResource
    {
        if (auth()->guard()->check()) {
            $cart = $this->cartRepository->with('items')
                        ->findOneWhere([
                            'customer_id' => auth()->guard()->user()->id,
                            'is_active'   => 1,
                        ]);

        } elseif (session()->has('cart')) {
            $cart = $this->cartRepository
                        ->with('items')
                        ->find(session()->get('cart')->id);
    
        }

        $productSlug = '';

        if (isset($cart)) {
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