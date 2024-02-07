<?php

namespace Webkul\Ekyc\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Event;
use Webkul\Checkout\Repositories\CartRepository;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Customer\Repositories\CustomerGroupRepository;
use Webkul\BulkUpload\Repositories\EkycVerificationRepository;

class EkycVerificationCreateOrUpdate
{
    /**
     * \Webkul\Customer\Repositories\EkycVerificationRepository $ekycVerificationRepository
     * \Webkul\Customer\Repositories\CustomerGroupRepository $customerGroupRepository
     * \Webkul\Customer\Repositories\CustomerRepository $customerRepository
     * \Webkul\Customer\Repositories\CartRepository $cartRepository
     */
    public function __construct(
        protected EkycVerificationRepository $ekycVerificationRepository,
        protected CustomerGroupRepository $customerGroupRepository,
        protected CustomerRepository $customerRepository,
        protected CartRepository $cartRepository,
    ) {
    }
    
    /**
     * add customer and ekyc detail
     */
    public function create($payload) 
    {
        $password = Str::random(10);

        /**
         * eKyc Proccessing
         */
        $verification = $this->ekycVerificationRepository->findOneByField([
            'transaction_id' => $payload['payload']['order']['transaction_id'],
            'sku'            => $payload['payload']['order']['product']['sku'],
            'status'         => 1,
        ]);

        if($verification) {
           return;
        }
        
        $this->ekycVerificationRepository->updateOrCreate([
            'transaction_id' => $payload['payload']['order']['transaction_id'],
            'sku'            => $payload['payload']['order']['product']['sku']
        ], [
            'cart_id'        => decrypt($payload['payload']['order']['transaction_id']),
            'transaction_id' => $payload['payload']['order']['transaction_id'],
            'password'       => encrypt($password),
            'sku'            => $payload['payload']['order']['product']['sku'],
            'status'         => 1,
            'payload'        => $payload,
        ]);

        /**
         * update property code into cart
         */
        $this->cartRepository->update([
            'property_code' => $payload['payload']['order']['property_code'],
        ], decrypt($payload['payload']['order']['transaction_id']));

        /**
         * Account Proccessing
         */
        $payload = $payload['payload']['order']['buyer'];

        $name = explode(' ', $payload['name']);
        
        /**
         * Account Name Proccessing
         */
        $firstName = current($name);
        next($name);
        $lastName = current($name);

        $data =  [
            'name'                      => $payload['name'],
            'first_name'                => $firstName,
            'last_name'                 => $lastName,
            'email'                     => $payload['email'],
            'date_of_birth'             => date('Y-m-d', strtotime($payload['birthdate'])),
            'address'                   => $payload['address'],
            'phone'                     => $payload['mobile'],
            'is_subscribed'             => 0,
            'password'                  => bcrypt($password),
            'api_token'                 => Str::random(80),
            'is_verified'               => ! core()->getConfigData('customer.settings.email.verification'),
            'customer_group_id'         => $this->customerGroupRepository->findOneWhere(['code' => 'general'])->id,
            'token'                     => md5(uniqid(rand(), true)),
            'subscribed_to_news_letter' => 0,
            'is_kyc_verified'           => 1,
        ];

        Event::dispatch('customer.registration.before');
        
        $customer = $this->customerRepository->updateOrCreate([
            'email' => $data['email']
        ], $data);
       
        $customer['original_password'] = $password;
        
        Event::dispatch('customer.registration.after', $customer);
    }
}