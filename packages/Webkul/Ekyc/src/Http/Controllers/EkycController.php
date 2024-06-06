<?php

namespace Webkul\Ekyc\Http\Controllers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\CMS\Repositories\PageRepository;
use Webkul\Checkout\Repositories\CartRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\BulkUpload\Repositories\EkycVerificationRepository;

class EkycController extends Controller
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected ProductRepository $productRepository,
        protected EkycVerificationRepository $ekycVerificationRepository,
        protected CartRepository $cartRepository,
        protected CustomerRepository $customerRepository,
        protected PageRepository $pageRepository,
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
    private function getSiteVerifyEndPoint(string $sku, string $transactionId): string
    {
        /**
         * In Production.
         */
        return "https://book.homeful.ph/auto-reserve/{$sku}/{$transactionId}";
    }

    /**
     *  Send Request for verification
     */
    public function store(): JsonResource
    {
        $data = request('request');

        $product = $this->productRepository->findBySlug($data['slug']);

        // Getting transition id for API
        $transactionId = encrypt($data['cartId']);

        $this->ekycVerificationRepository->updateOrCreate([
            'cart_id' => $data['cartId'],
            'sku'     => $product->sku,
        ], [
            'cart_id'        => $data['cartId'],
            'sku'            => $product->sku,
            'status'         => 0,
            'transaction_id' => $transactionId,
            'payload'        => $data,
        ]);

        return new JsonResource([
            'redirect' => $this->getSiteVerifyEndPoint($product->sku, $transactionId),
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

        if ($ekycVerification) {
            return new JsonResource([
                'transaction_id' => $ekycVerification->transaction_id,
                'status'         => $ekycVerification->status,
            ]);
        }

        return new JsonResource([
            'transaction_id' => null,
            'status'         => false,
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

    /**
     * Getting URL
     *
     * @return \Illuminate\Http\Response
     */
    public function getUrl()
    {
        $data = request()->all();

        $product = $this->productRepository->findBySlug($data['slug']);

        $ekycVerification = $this->ekycVerificationRepository->findOneByField([
            'sku'     => $product->sku,
            'cart_id' => $data['cart_id'],
        ]);

        if ($ekycVerification) {
            return new JsonResource([
                'url'    => $this->getSiteVerifyEndPoint($product->sku, $ekycVerification->transaction_id),
                'status' => $ekycVerification->status,
            ]);
        }

        return new JsonResource([
            'url'    => null,
            'status' => false,
        ]);
    }

    /**
     * Getting URL
     *
     * @return \Illuminate\Http\Response
     */
    public function pageContent()
    {
        return new JsonResource([
            'page'   => $this->pageRepository->findOneByField('layout', 'verify-page'),
        ]);
    }
}
