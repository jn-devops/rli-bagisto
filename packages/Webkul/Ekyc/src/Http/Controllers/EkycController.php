<?php

namespace Webkul\Ekyc\Http\Controllers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\Ekyc\Http\Controllers\Controller;
use Webkul\Checkout\Repositories\CartRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\BulkUpload\Repositories\EkycVerificationRepository;
use Webkul\Customer\Repositories\CustomerRepository;

class EkycController extends Controller
{
    /**
     * \Webkul\Product\Repositories\ProductRepository $productRepository
     * \Webkul\BulkUpload\Repositories\EkycVerificationRepository $ekycVerificationRepository
     * \Webkul\Checkout\Repositories\CartRepository $cartRepository
     * \Webkul\Customer\Repositories\CustomerRepository $customerRepository
     */
    public function __construct(
        protected ProductRepository $productRepository,
        protected EkycVerificationRepository $ekycVerificationRepository,
        protected CartRepository $cartRepository,
        protected CustomerRepository $customerRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (empty(request('slug')) 
            || empty(request('cartId'))) {
            abort(404);
        }

        $request = [
            'slug'   => request('slug'),
            'cartId' => request('cartId'),
        ];

        $product = $this->productRepository->findBySlug($request['slug']);

        $verification = $this->ekycVerificationRepository->findOneByField([
            'cart_id' => $request['cartId'],
            'sku'     => $product->sku,
        ]);

        return view('shop::checkout.ekyc.index', compact('request', 'verification'));
    }

    /**
     * EndPoint URL
     */
    private function getSiteVerifyEndpoint(string $sku, string $transaction_id) : string
    {
        /**
         * In test Mode.
         */
        //return "https://book-dev.enclaves.ph/auto-reserve/ABC-123/REF004";

        /**
         * In Production.
         */
        return "https://book-dev.enclaves.ph/auto-reserve/{$sku}/{$transaction_id}";
    }

    /**
     *  Send Request for verification
     */
    public function store(): JsonResource
    {
        $data = request('request');

        $product = $this->productRepository->findBySlug($data['slug']);
       
        // Getting transation id for API
        $transaction_id = encrypt($data['cartId']);
        
        $this->ekycVerificationRepository->updateOrCreate([
            'cart_id' => $data['cartId'],
            'sku'     => $product->sku,
        ], [
            'cart_id'        => $data['cartId'],
            'sku'            => $product->sku,
            'status'         => 0,
            'transaction_id' => $transaction_id,
            'payload'        => $data,
        ]);
    
        return new JsonResource([
            'redirect' => $this->getSiteVerifyEndpoint($product->sku, $transaction_id),
        ]);
    }

    /**
     * get verification
     */
    public function getVerification()
    {
        $data = request()->all();

        $product = $this->productRepository->findBySlug($data['slug']);

        $ekycVerification = $this->ekycVerificationRepository->findOneByField([
            'sku'     => $product->sku,
            'cart_id' => $data['cart_id'],
        ]);

        return new JsonResource([
            'transaction_id' => $ekycVerification->transaction_id,
            'status'         => $ekycVerification->status,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function customerLogin()
    {
        $ekyc = $this->ekycVerificationRepository->findOneByField('transaction_id', request('transaction_id'));
        
        $payload = $ekyc->payload['payload'];
        
        $loginRequest = [
            'email'    => $payload['order']['buyer']['email'],
            'password' => decrypt($ekyc->password),
        ];

        if (! auth()->guard('customer')->attempt($loginRequest)) {
            session()->flash('error', trans('shop::app.customers.login-form.invalid-credentials'));

            return redirect()->back();
        }
        
        if (! auth()->guard('customer')->user()->status) {
            auth()->guard('customer')->logout();

            session()->flash('warning', trans('shop::app.customers.login-form.not-activated'));

            return redirect()->back();
        }
        
        if (! auth()->guard('customer')->user()->is_verified) {
            session()->flash('info', trans('shop::app.customers.login-form.verify-first'));

            Cookie::queue(Cookie::make('enable-resend', 'true', 1));

            Cookie::queue(Cookie::make('email-for-resend', $loginRequest['email'], 1));

            auth()->guard('customer')->logout();

            return redirect()->back();
        }

        /**
         * Event passed to prepare cart after login.
         */
        Event::dispatch('customer.after.login', $loginRequest['email']);

        return new JsonResource([
            'redirect' => route('shop.checkout.onepage.index'),
        ]);
    }
}