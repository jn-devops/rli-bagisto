<?php

namespace Webkul\BulkUpload\Listeners;

use Webkul\BulkUpload\Repositories\EkycVerificationRepository;

class PaymentsListener
{
    public function __construct(
        protected EkycVerificationRepository $ekycVerificationRepository
    ) {
    }

    /**
     * Create product in Krayin.
     *
     * @param  object  $product
     * @return void
     */
    public function payments($payload)
    {
        $this->ekycVerificationRepository->updateOrCreate([
            'cart_id' => $payload['transaction_id'],
            'sku'     => $payload['sku']
        ], [
            'cart_id' => $payload['transaction_id'],
            'sku'     => $payload['sku'],
            'status'  => 1,
            'payload' => json_encode($payload),
        ]);
    }

    /**
     * Return webhook response
     */
    public function response()
    {
        return $this->ekycVerificationRepository->get();
    }
}
