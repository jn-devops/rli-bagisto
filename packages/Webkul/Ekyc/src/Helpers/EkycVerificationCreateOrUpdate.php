<?php

namespace Webkul\Ekyc\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Event;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Customer\Repositories\CustomerGroupRepository;
use Webkul\BulkUpload\Repositories\EkycVerificationRepository;

class EkycVerificationCreateOrUpdate
{
    /**
     * \Webkul\Customer\Repositories\EkycVerificationRepository $ekycVerificationRepository
     * \Webkul\Customer\Repositories\CustomerGroupRepository $customerGroupRepository
     * \Webkul\Customer\Repositories\CustomerRepository $customerRepository
     */
    public function __construct(
        protected EkycVerificationRepository $ekycVerificationRepository,
        protected CustomerGroupRepository $customerGroupRepository,
        protected CustomerRepository $customerRepository,
    ) {
    }
    
    /**
     * Add image details in ProductMediaRepository repo.
     */
    public function create($payload) 
    {
        /**
         * eKyc Proccessing
         */
        $verification = $this->ekycVerificationRepository->findOneByField([
            'transaction_id' => $payload['payload']['order']['transaction_id'],
            'sku'            => $payload['payload']['order']['product']['sku'],
            'status'         => 1,
        ]);

        if($verification) {
          // return;
        }
        
        $this->ekycVerificationRepository->updateOrCreate([
            'transaction_id' => $payload['payload']['order']['transaction_id'],
            'sku'     => $payload['payload']['order']['product']['sku']
        ], [
            'cart_id'        => decrypt($payload['payload']['order']['transaction_id']),
            'transaction_id' => $payload['payload']['order']['transaction_id'],
            'sku'            => $payload['payload']['order']['product']['sku'],
            'status'         => 1,
            'payload'        => json_encode($payload),
        ]);

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

        $password = Str::random(10);

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
       
        /**
         * Login processing
         */
        $this->customerLogin([
            'email'    => $payload['email'],
            'password' => $password
        ]);

        
        auth()->guard('customer')->login($customer, true);

        $customer['original_password'] = $password;
        
        Event::dispatch('customer.registration.after', $customer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function customerLogin(array $loginRequest)
    {
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

        return redirect()->route('shop.home.index');
    }
}