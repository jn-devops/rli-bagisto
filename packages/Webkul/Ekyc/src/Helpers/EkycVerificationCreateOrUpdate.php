<?php

namespace Webkul\Ekyc\Helpers;

use Webkul\BulkUpload\Repositories\EkycVerificationRepository;

class EkycVerificationCreateOrUpdate
{
    /**
     * \Webkul\Customer\Repositories\EkycVerificationRepository $ekycVerificationRepository
     * \Webkul\Customer\Repositories\CustomerRepository $customerRepository
     */
    public function __construct(
        protected EkycVerificationRepository $ekycVerificationRepository,
    ) {
    }
    
    /**
     * Add image details in ProductMediaRepository repo.
     *
     */
    public function create($payload) 
    {
        $verification = $this->ekycVerificationRepository->findOneByField([
            'cart_id' => $payload['transaction_id'],
            'sku'     => $payload['reservation_code'],
            'status'  => 1,
        ]);

        if($verification) {
            return;
        }

        $this->ekycVerificationRepository->updateOrCreate([
            'cart_id' => $payload['transaction_id'],
            'sku'     => $payload['reservation_code']
        ], [
            'cart_id' => $payload['transaction_id'],
            'sku'     => $payload['reservation_code'],
            'status'  => 1,
            'payload' => json_encode($payload),
        ]);
    }
}