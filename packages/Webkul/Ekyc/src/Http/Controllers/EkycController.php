<?php

namespace Webkul\Ekyc\Http\Controllers;

use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\Ekyc\Http\Controllers\Controller;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\BulkUpload\Repositories\EkycVerificationRepository;

class EkycController extends Controller
{
    /**
     * \Webkul\Product\Repositories\ProductRepository $productRepository
     * \Webkul\BulkUpload\Repositories\EkycVerificationRepository $ekycVerificationRepository
     */
    public function __construct(
        protected ProductRepository $productRepository,
        protected EkycVerificationRepository $ekycVerificationRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if(empty(request('slug')) 
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
        return "https://book-dev.enclaves.ph/edit-order/JN-TPL2XX/59";

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
       
        $this->ekycVerificationRepository->updateOrCreate([
            'cart_id' => $data['cartId'],
            'sku'     => $product->sku,
        ], [
            'cart_id' => $data['cartId'],
            'sku'     => $product->sku,
            'status'  => 0,
            'payload' => json_encode($data),
        ]);
    
        return new JsonResource([
            'redirect' => $this->getSiteVerifyEndpoint($product->sku, $data['cartId']),
        ]);
    }
}