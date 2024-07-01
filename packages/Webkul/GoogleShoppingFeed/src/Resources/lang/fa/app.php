<?php

return [
    'admin' => [
        'configuration' => [
            'settings' => [
                'title' => 'فید خرید گوگل',
                'info'  => 'فید خرید گوگل',

                'general' => [
                    'title'                 => 'عمومی',
                    'info'                  => 'تنظیم وضعیت ماژول، نام برنامه Google، کلیدهای OAuth Google و شناسه تاجر.',
                    'enable-module'         => 'فعال کردن ماژول',
                    'application-name'      => 'تنظیم نام برنامه Google',
                    'google-api-key'        => 'کلید Oauth گوگل',
                    'google-api-secret-key' => 'کلید مخفی Oauth گوگل',
                    'google-merchant-id'    => 'شناسه فروشنده گوگل شاپ',
                ],

                'default' => [
                    'title'             => 'پیکربندی پیش‌فرض',
                    'info'              => 'تنظیم دسته بندی پیشفرض، واحد وزن، گروه سنی، در دسترس بودن محصولات، شرایط و کشور مقصد.',
                    'category'          => 'دسته بندی پیش‌فرض',
                    'category-info'     => 'از طبقه بندی گوگل استفاده کنید مثلا لباس و لوازم جانبی لینک https://support.google.com/merchants/answer/6324436?hl=en',
                    'weight-unit'       => 'واحد وزن',
                    'new'               => 'جدید',
                    'old'               => 'قدیمی',
                    'male'              => 'مرد',
                    'female'            => 'زن',
                    'kids'              => 'بچه‌ها',
                    'adult'             => 'بزرگسال',
                    'child'             => 'کودک',
                    'age-group'         => 'گروه سنی',
                    'available-for'     => 'محصول موجود برای',
                    'product-condition' => 'وضعیت محصول',
                    'tax-apply-on-ship' => 'اعمال مالیات بر روی حمل و نقل',
                    'tax-apply-as'      => 'اعمال مالیات خرید به عنوان',
                    'tax-rate'          => 'نرخ مالیات',
                    'target-country'    => 'کشور هدف',
                ],
            ],
        ],

        'layouts' => [
            'google-feed' => 'فید خرید گوگل',
            'category'    => 'نقشه برداری دسته بندی',
            'product'     => 'محصولات',
            'attribute'   => 'نقشه برداری ویژگی',

            'settings' => [
                'title'                 => 'فید خرید گوگل',
                'auth'                  => 'احراز هویت حساب',
                'auth-btn'              => 'احراز هویت',
                'auth-refresh-btn'      => 'تازه سازی توکن',
                'api-key'               => 'کلید API Oauth',
                'google-api-secret-key' => 'کلید مخفی Oauth گوگل',
                'api-secret-key'        => 'کلید مخفی API Oauth',
                'auth-success'          => 'با موفقیت احراز هویت شد',
                'refreshed-token'       => 'توکن دسترسی با موفقیت تازه سازی شد',
            ],
        ],

        'attribute' => [
            'title' => 'نقشه برداری ویژگی محصول گوگل',
            
            'index' => [
                'product-id'      => 'شناسه محصول',
                'title-id'        => 'عنوان',
                'description-id'  => 'توضیحات',
                'gtin-id'         => 'GTIN',
                'brand-id'        => 'برند',
                'color-id'        => 'رنگ',
                'weight-id'       => 'وزن حمل',
                'image-id'        => 'لینک تصویر',
                'size-id'         => 'سایز',
                'size-system-id'  => 'سیستم سایز',
                'size-type-id'    => 'نوع سایز',
                'mpn-id'          => 'MPN',
                'save-btn-title'  => 'ذخیره',
                'reset-btn-title' => 'تازه سازی',
            ],

            'save-success'   => 'ویژگی های نقشه برداری شده با موفقیت ذخیره شدند',
            'update-success' => 'ویژگی های نقشه برداری شده با موفقیت به روز رسانی شدند',
            'delete-success' => 'با موفقیت تازه سازی شد',
            'delete-failed'  => 'خطا! حذف ناموفق بود.',
        ],
        
        'map-categories' => [
            'success-save'   => 'دسته بندی با موفقیت نقشه برداری شد',
            'success-delete' => 'دسته بندی نقشه برداری شده با موفقیت حذف شد',
            'index' => [
                'title'         => 'نقشه برداری دسته بندی های گوگل',
                'map-btn-title' => 'نقشه برداری دسته بندی جدید',

                'datagrid' => [
                    'id'          => 'شناسه',
                    'delete'      => 'حذف',
                    'store-name'  => 'نام دسته بندی فروشگاه',
                    'google-name' => 'نام دسته بندی گوگل',
                ],
            ],

            'create' => [
                'add-title'                     => 'نقشه برداری دسته بندی جدید',
                'refresh'                       => 'تازه سازی',
                'save'                          => 'ذخیره',
                'select-category'               => 'انتخاب دسته بندی',
                'entry-choose-bagisto-category' => 'انتخاب دسته بندی فروشگاه',
                'entry-select-bagisto-category' => 'انتخاب دسته بندی فروشگاه',
                'entry-choose-origin-category'  => 'انتخاب دسته بندی گوگل',
            ],
        ],

        'product' => [
            'index'  => [
                'title'     => 'محصولات صادر شده',
                'add-title' => 'افزودن صفحه CMS',
            ],

            'export' => [
                'title'       => 'صادرات به Google Shop',
                'please-wait' => 'لطفا صبر کنید. محصول در حال بارگذاری است.',
            ],

            'refresh'              => 'توکن دسترسی شما منقضی شده است. لطفاً توکن خود را تازه کنید.',
            'something-went-wrong' => 'مشکلی پیش آمده است. لطفاً دوباره امتحان کنید.',
            'map-attribute-failed' => 'لطفاً ویژگی‌ها را نقشه برداری کنید و دوباره امتحان کنید.',
            'export-success'       => 'محصولات با موفقیت صادر شدند.',
        ],

        'store' => [
            'select-store-category'  => 'لطفا دسته بندی فروشگاه را انتخاب کنید',
            'select-google-category' => 'لطفا دسته بندی گوگل را انتخاب کنید',
        ],
    ],

    'acl' => [
        'google-feed' => 'فید خرید گوگل',
        'category'    => 'نقشه‌برداری دسته‌بندی',
        'product'     => 'محصولات',
        'attribute'   => 'نقشه‌برداری ویژگی',
        'refresh'     => 'تازه‌سازی',
        'destroy'     => 'نابود کردن',
        'export'      => 'صادر کردن',
        'create'      => 'ایجاد کردن',
        'auth'        => 'احراز هویت',
   ],
];