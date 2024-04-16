<?php

return [
    'emails' => [
        'dear'   => 'Dear :customer_name',
        'thanks' => 'If you need any kind of help please contact us at <a href=":link" style=":style">:email</a>.<br/>Thanks!',

        'customers' => [
            'registration' => [
                'credentials-description' => 'Your account has been created. Your account details are below:',
                'description'             => 'Your account has now been created successfully and you can login using your email address and password credentials. Upon logging in, you will be able to access other services including reviewing past orders, wishlists and editing your account information.',
                'greeting'                => 'Welcome and thank you for registering with us!',
                'password'                => 'Password',
                'sign-in'                 => 'Sign in',
                'subject'                 => 'New Customer Registration',
                'update'                  => 'Customer Detail Update',
                'username-email'          => 'Username/Email',
            ],

            'forgot-password' => [
                'description'    => 'You are receiving this email because we received a password reset request for your account.',
                'greeting'       => 'Forgot Password!',
                'reset-password' => 'Reset Password',
                'subject'        => 'Reset Password Email',
            ],

            'update-password' => [
                'description' => 'You are receiving this email because you have updated your password.',
                'greeting'    => 'Password Updated!',
                'subject'     => 'Password Updated',
            ],

            'verification' => [
                'description'  => 'Please click the button below to verify your email address.',
                'greeting'     => 'Welcome!',
                'subject'      => 'Account Verification Email',
                'verify-email' => 'Verify Email Address',
            ],

            'commented' => [
                'description' => 'Note Is - :note',
                'subject'     => 'New comment Added',
            ],

            'subscribed' => [
                'description' => 'Congratulations and welcome to our newsletter community! We\'re excited to have you on board and keep you updated with the latest news, trends, and exclusive offers.',
                'greeting'    => 'Welcome to our newsletter!',
                'subject'     => 'You! Subscribe to Our Newsletter',
                'unsubscribe' => 'Unsubscribe',
            ],
        ],

        'orders' => [
            'created' => [
                'greeting' => 'Thanks for your Order :order_id placed on :created_at',
                'subject'  => 'New Order Confirmation',
                'summary'  => 'Summary of Order',
                'title'    => 'Order Confirmation!',
            ],

            'invoiced' => [
                'greeting' => 'Your invoice #:invoice_id for Order :order_id created on :created_at',
                'subject'  => 'New Invoice Confirmation',
                'summary'  => 'Summary of Invoice',
                'title'    => 'Invoice Confirmation!',
            ],

            'shipped' => [
                'greeting' => 'Your order :order_id placed on :created_at has been shipped',
                'subject'  => 'New Shipment Confirmation',
                'summary'  => 'Summary of Shipment',
                'title'    => 'Order Shipped!',
            ],

            'refunded' => [
                'greeting' => 'Refund has been initiated for the :order_id placed on :created_at',
                'subject'  => 'New Refund Confirmation',
                'summary'  => 'Summary of Refund',
                'title'    => 'Order Refunded!',
            ],

            'canceled' => [
                'greeting' => 'Your Order :order_id placed on :created_at has been canceled',
                'subject'  => 'New Order Canceled',
                'summary'  => 'Summary of Order',
                'title'    => 'Order Canceled!',
            ],

            'commented' => [
                'subject' => 'New comment Added',
                'title'   => 'New comment added to your order :order_id placed on :created_at',
            ],

            'billing-address'   => 'Billing Address',
            'carrier'           => 'Carrier',
            'contact'           => 'Contact',
            'discount'          => 'Discount',
            'grand-total'       => 'Grand Total',
            'name'              => 'Name',
            'payment'           => 'Payment',
            'price'             => 'Price',
            'qty'               => 'Qty',
            'shipping'          => 'Shipping',
            'shipping-address'  => 'Shipping Address',
            'shipping-handling' => 'Shipping Handling',
            'sku'               => 'SKU',
            'subtotal'          => 'Subtotal',
            'tax'               => 'Tax',
            'tracking-number'   => 'Tracking Number : :tracking_number',
        ],
    ],

    'shop' => [
        'layouts' => [
            'transactions' => 'Transactions',
            'inquiries'    => 'Inquiries',
            'help-seminar' => 'Help Seminar',
        ],

        'customers' => [
            'inquiries' => [
                'title'         => 'Inquiries',
                'help_test'     => 'How can we help you?',
                'submit-header' => 'Submit Ticket',
                'submit-text'   => 'Click here to report your concern and we will respons as soon as we can.',
                'tickets'       => 'Your Tickets',
                'tickets_text'  => 'You can follow-up and get updates on your active tickets here.',
                'frequently'    => 'Frequently Asked Questions',
                'placeholder'   => 'Write the details of your concern here....',
                'reservation'   => 'Reservation',
                'btn-upload'    => 'Upload Files',
                'submit'        => 'Submit',

                'list' => [
                    'title'          => 'Your Tickets',
                    'create-success' => 'Ticket successfully created',
                ],
            ],

            'login-form' => [
                'page-title' => 'Log in your Account',
            ],

            'account' => [
                'help-seminar' => [
                    'title' => 'Help Seminar',
                ],
            ],

            'choose-unit'          => 'Choose Unit',
            'browse-properties'    => 'Browse Properties',
            'total-contract-price' => 'Total Contract Price',
        ],

        'product' => [
            'reserve-now'     => 'Reserve Now',
            'select-area'     => 'Check & Select Area',
            'reservation-fee' => 'Reservation Fee: ',
            'contract-price'  => 'Total Contract Price:',
            'cart'            => [
                'add-to-cart' => 'Choose Unit',
            ],
        ],

        'authentication' => [
            'title'        => 'Verify your profile',
            'body_text'    => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            'authenticate' => 'Proceed to Booking',
        ],

        'homepage' => [
            'slider' => [
                'title' => 'Raemulan Lands Inc.',
            ],

            'most-view' => [
                'title'          => 'Our Newest Communities',
                'contract-price' => 'Total Contract Price',
                'choose-unit'    => 'Choose Unit',
            ],
        ],

        'components' => [
            'layouts' => [
                'header' => [
                    'login'           => 'Log in',
                    'manage-property' => 'Manage your property.',
                ],
            ],
        ],
    ],

    'admin' => [
        'settings' => [
            'themes' => [
                'edit' => [
                    'button_text'       => 'Button Text',
                    'slider_syntax'     => 'Slider Syntax',
                    'required'          => 'Field is Required.',
                    'limit_slider_text' => '30 Letters allow only',
                    'limit_button_text' => '20 Letters allow only',
                    'edit-slider'       => 'Edit theme slider',
                    'image_cdn_link'    => 'CDN Link',
                    'cdn_status'        => 'CDN Link Status',
                ],
            ],
        ],

        'menu' => [
            'inquiries' => 'Inquiries',
        ],

        'inquiries' => [
            'title' => 'Inquiries',

            'datagrid' => [
                'header' => [
                    'id'            => 'id',
                    'customer-name' => 'Customer Name',
                    'reason'        => 'Reason',
                    'comment'       => 'Comments',
                    'status'        => 'Status',
                    'created-at'    => 'Created At',
                ],
            ],

            'form' => [
                'create' => [
                    'customer'       => 'Customer',
                    'create-btn'     => 'Create',
                    'reason'         => 'Reason',
                    'status'         => 'Status',
                    'comment'        => 'Comment',
                    'save-btn'       => 'Save',
                    'create-success' => 'Inquiry created successfully',
                ],

                'view' => [
                    'comment'         => 'Comment:',
                    'attachment'      => 'Attachment:',
                    'comment-name'    => 'Comment Name:',
                    'no-image'        => 'No image Available',
                    'attachment-info' => 'Click on Image for Download',
                    'delete-btn'      => 'Delete',
                ],

                'edit' => [
                    'edit-btn'       => 'Edit',
                    'customer'       => 'Customer',
                    'reason'         => 'Reason',
                    'status'         => 'Status',
                    'comment'        => 'Comment',
                    'update-btn'     => 'Update',
                    'delete'         => 'Delete',
                    'error'          => 'Somethink is wrong',
                    'delete-success' => 'Inquiry Deleted Successfully',
                    'update-success' => 'Inquiry updated successfully',
                ],
            ],
        ],

        'catalog' => [
            'category' => [
                'index' => [
                    'button-setting' => 'Our Newest Communities Button Setting',
                    'button' => [
                        'color'            => 'Color',
                        'border-color'     => 'Border Color',
                        'background-color' => 'Background Color',
                        'sort'             => 'Sort',
                        'field-info'       => "Please ensure that the value starts with a '#' symbol, like this: #ABCD.",
                    ],
                ],
            ],
        ],
    ],
];
