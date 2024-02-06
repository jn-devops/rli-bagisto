<?php

namespace Webkul\Shop\Mail\Customer;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Queue\SerializesModels;

class RegistrationNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new mailable instance.
     *
     * @param  \Webkul\Customer\Contracts\Customer  $customer
     * @return void
     */
    public function __construct(public $customer, protected $password = '')
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(core()->getSenderEmailDetails()['email'], core()->getSenderEmailDetails()['name'])
            ->to($this->customer->email)
            ->subject(trans('shop::app.emails.customers.registration.subject'))
            ->view('shop::emails.customers.registration', [
                'fullName'  => $this->customer->first_name . ' ' . $this->customer->last_name,
                'user_name' => $this->customer->email,
                'password'  => $this->password,
            ]);
    }
}
