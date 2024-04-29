<?php

namespace Webkul\Enclaves\Listeners;

use Illuminate\Support\Facades\Mail;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Enclaves\Mail\Customer\NewCustomerNotification;
use Webkul\Enclaves\Mail\Customer\UpdateCustomerNotification;

class Customer
{
    /**
     * After Customer is created
     *
     * @return void
     */
    public function afterCreate($customer)
    {
        $password = request('password_confirmation');

        $customer->password = bcrypt($password);
        $customer->save();

        try {
            Mail::queue(new NewCustomerNotification($customer, $password));
        } catch (\Exception $e) {
            report($e);
        }
    }

    /**
     * After Customer is updated
     *
     * @return void
     */
    public function afterUpdate($customer)
    {
        if (! $password = request('password_confirmation')) {
            return;
        }

        $customer->password = bcrypt($password);
        $customer->save();

        try {
            Mail::queue(new UpdateCustomerNotification($customer, $password));
        } catch (\Exception $e) {
            report($e);
        }
    }
}
