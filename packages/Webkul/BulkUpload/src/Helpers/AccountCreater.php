<?php

namespace Webkul\BulkUpload\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Event;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Customer\Repositories\CustomerGroupRepository;

class AccountCreater
{
    /**
     * \Webkul\Customer\Repositories\CustomerGroupRepository $customerGroupRepository
     * \Webkul\Customer\Repositories\CustomerRepository $customerRepository
     */
    public function __construct(
        protected CustomerGroupRepository $customerGroupRepository,
        protected CustomerRepository $customerRepository
    ) {
    }

    /**
     * Add image details in ProductMediaRepository repo.
     */
    public function create($payload) 
    {
        $name = explode(' ', $payload['name']);
        
        /**
         * Account Name Proccessing
         */
        $firstName = current($name);
        next($name);
        $lastName = current($name);

        $password = Str::random(10);

        $data =  [
            'first_name'                => $firstName,
            'last_name'                 => $lastName,
            'email'                     => $payload['email'],
            'is_subscribed'             => 0,
            'password'                  => bcrypt($password),
            'api_token'                 => Str::random(80),
            'is_verified'               => ! core()->getConfigData('customer.settings.email.verification'),
            'customer_group_id'         => $this->customerGroupRepository->findOneWhere(['code' => 'general'])->id,
            'token'                     => md5(uniqid(rand(), true)),
            'subscribed_to_news_letter' => 0,
        ];

        Event::dispatch('customer.registration.before');

        $customer = $this->customerRepository->updateOrCreate([
            'email' => $data['email']
        ], $data);
       
        $customer['original_password'] = $password;

        Event::dispatch('customer.registration.after', $customer);

        return $customer;
    }
}