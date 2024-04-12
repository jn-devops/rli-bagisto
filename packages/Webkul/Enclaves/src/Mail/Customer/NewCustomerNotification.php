<?php

namespace Webkul\Enclaves\Mail\Customer;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Webkul\Customer\Contracts\Customer;
use Webkul\Enclaves\Mail\Mailable;

class NewCustomerNotification extends Mailable
{
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public Customer $customer,
        public string $password
    ) {
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            to: [
                new Address($this->customer->email),
            ],
            subject: trans('enclaves::app.emails.customers.registration.subject'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'enclaves::shop.emails.customers.new-customer',
        );
    }
}
