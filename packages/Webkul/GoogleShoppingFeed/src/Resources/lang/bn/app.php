<?php

return [
    'admin' => [
        'configuration' => [
            'settings' => [
                'title' => 'গুগল শপিং ফিড',
                'info'  => 'গুগল শপিং ফিড',

                'general' => [
                    'title'                 => 'সাধারণ',
                    'info'                  => 'মডিউল স্থিতি সেট করুন, গুগল অ্যাপ্লিকেশন নাম, গুগল OAuth কী এবং মার্চেন্ট আইডি।',
                    'enable-module'         => 'মডিউল সক্রিয় করুন',
                    'application-name'      => 'গুগল অ্যাপ্লিকেশন নাম নির্ধারণ করুন',
                    'google-api-key'        => 'গুগল ওথ কী',
                    'google-api-secret-key' => 'গুগল ওথ সিক্রেট কী',
                    'google-merchant-id'    => 'গুগল শপ মার্চেন্ট আইডি',
                ],

                'default' => [
                    'title'             => 'ডিফল্ট কনফিগারেশন',
                    'info'              => 'ডিফল্ট বিভাগ, ওজন একক, বয়স গ্রুপ, পণ্য উপলব্ধতা, শর্তাদি এবং লক্ষ্য দেশ নির্ধারণ করুন।',
                    'category'          => 'ডিফল্ট ক্যাটাগরি',
                    'category-info'     => 'গুগল ট্যাক্সোনমি ব্যবহার করুন যেমন পোশাক ও আনুষাঙ্গিক লিংক https://support.google.com/merchants/answer/6324436?hl=en',
                    'weight-unit'       => 'ওজন একক',
                    'new'               => 'নতুন',
                    'old'               => 'পুরানো',
                    'male'              => 'পুরুষ',
                    'female'            => 'মহিলা',
                    'kids'              => 'শিশু',
                    'adult'             => 'প্রাপ্তবয়স্ক',
                    'child'             => 'শিশু',
                    'age-group'         => 'বয়স গ্রুপ',
                    'available-for'     => 'পণ্য উপলব্ধ আছে',
                    'product-condition' => 'পণ্যের অবস্থা',
                    'tax-apply-on-ship' => 'জাহাজে কর প্রয়োগ করুন',
                    'tax-apply-as'      => 'শপিং কর প্রয়োগ করুন হিসাবে',
                    'tax-rate'          => 'করের হার',
                    'target-country'    => 'লক্ষ্য দেশ',
                ],
            ],
        ],

        'layouts' => [
            'google-feed' => 'গুগল শপিং ফিড',
            'category'    => 'ম্যাপ ক্যাটাগরি',
            'product'     => 'প্রোডাক্টস',
            'attribute'   => 'ম্যাপ এট্রিবিউট',

            'settings' => [
                'title'                 => 'গুগল শপিং ফিড',
                'auth'                  => 'একাউন্ট প্রমাণীকরণ',
                'auth-btn'              => 'প্রমাণীকরণ',
                'auth-refresh-btn'      => 'টোকেন রিফ্রেশ করুন',
                'api-key'               => 'ওথ এপিআই কী',
                'google-api-secret-key' => 'গুগল ওথ সিক্রেট কী',
                'api-secret-key'        => 'ওথ এপিআই সিক্রেট কী',
                'auth-success'          => 'সফলভাবে প্রমাণীকৃত',
                'refreshed-token'       => 'অ্যাক্সেস টোকেন সফলভাবে রিফ্রেশ হয়েছে',
            ],
        ],

        'attribute' => [
            'title' => 'গুগল প্রোডাক্ট এট্রিবিউট ম্যাপ করুন',
            
            'index' => [
                'product-id'      => 'প্রোডাক্ট আইডি',
                'title-id'        => 'শিরোনাম',
                'description-id'  => 'বিবরণ',
                'gtin-id'         => 'জিটিআইএন',
                'brand-id'        => 'ব্র্যান্ড',
                'color-id'        => 'রঙ',
                'weight-id'       => 'শিপিং ওজন',
                'image-id'        => 'ছবির লিংক',
                'size-id'         => 'আকার',
                'size-system-id'  => 'আকারের সিস্টেম',
                'size-type-id'    => 'আকারের ধরণ',
                'mpn-id'          => 'এমপিএন',
                'save-btn-title'  => 'সংরক্ষণ করুন',
                'reset-btn-title' => 'রিফ্রেশ',
            ],

            'save-success'   => 'ম্যাপ করা এট্রিবিউটগুলি সফলভাবে সংরক্ষণ হয়েছে',
            'update-success' => 'ম্যাপ করা এট্রিবিউটগুলি সফলভাবে আপডেট হয়েছে',
            'delete-success' => 'রিফ্রেশ সফলভাবে হয়েছে',
            'delete-failed'  => 'ত্রুটি! মুছে ফেলা ব্যর্থ হয়েছে।',
        ],

        'map-categories' => [
            'success-save'   => 'ক্যাটাগরি সফলভাবে ম্যাপ করা হয়েছে',
            'success-delete' => 'ম্যাপ করা ক্যাটাগরি সফলভাবে মুছে ফেলা হয়েছে',
            'index' => [
                'title'         => 'গুগল ক্যাটাগরি ম্যাপ করুন',
                'map-btn-title' => 'নতুন ক্যাটাগরি ম্যাপ করুন',

                'datagrid' => [
                    'id'          => 'আইডি',
                    'delete'      => 'মুছে ফেলুন',
                    'store-name'  => 'স্টোর ক্যাটাগরির নাম',
                    'google-name' => 'গুগল ক্যাটাগরির নাম',
                ],
            ],

            'create' => [
                'add-title'                     => 'নতুন ক্যাটাগরি ম্যাপ করুন',
                'refresh'                       => 'রিফ্রেশ',
                'save'                          => 'সংরক্ষণ করুন',
                'select-category'               => 'ক্যাটাগরি নির্বাচন করুন',
                'entry-choose-bagisto-category' => 'স্টোর ক্যাটাগরি নির্বাচন করুন',
                'entry-select-bagisto-category' => 'স্টোর ক্যাটাগরি নির্বাচন করুন',
                'entry-choose-origin-category'  => 'গুগল ক্যাটাগরি নির্বাচন করুন',
            ],
        ],

        'product' => [
            'index'  => [
                'title'     => 'রপ্তানি করা প্রোডাক্টস',
                'add-title' => 'সিএমএস পেজ যোগ করুন',
            ],

            'export' => [
                'title'       => 'Google শপে রপ্তানি',
                'please-wait' => 'অনুগ্রহ করে অপেক্ষা করুন। প্রোডাক্ট আপলোড হচ্ছে।',
            ],

            'refresh'              => 'আপনার এক্সেস টোকেনের মেয়াদ শেষ হয়েছে। অনুগ্রহ করে আপনার টোকেন রিফ্রেশ করুন।',
            'something-went-wrong' => 'কিছু ভুল হয়েছে। অনুগ্রহ করে আবার চেষ্টা করুন।',
            'map-attribute-failed' => 'দয়া করে গুণগুলি ম্যাপ করে আবার চেষ্টা করুন।',
            'export-success'       => 'পণ্যগুলি সফলভাবে রপ্তানি করা হয়েছে।',
        ],

        'store' => [
            'select-store-category'  => 'দয়া করে স্টোর ক্যাটাগরি নির্বাচন করুন',
            'select-google-category' => 'দয়া করে গুগল ',
        ],
    ],

    'acl' => [
        'google-feed' => 'গুগল শপিং ফিড',
        'category'    => 'বিভাগ ম্যাপ করুন',
        'product'     => 'পণ্য',
        'attribute'   => 'গুণ ম্যাপ করুন',
        'refresh'     => 'আপডেট করুন',
        'destroy'     => 'ধ্বংস করুন',
        'export'      => 'রপ্তানি',
       'create'      => 'তৈরি করুন',
       'auth'        => 'প্রমাণীকরণ',
    ],
];