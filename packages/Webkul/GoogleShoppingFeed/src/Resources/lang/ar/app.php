<?php

return [
    'admin' => [
        'configuration' => [
            'settings' => [
                'title' => 'تغذية التسوق من Google',
                'info'  => 'تغذية التسوق من Google',

                'general' => [
                    'title'                 => 'عام',
                    'info'                  => 'تعيين حالة الوحدة، اسم تطبيق Google، مفاتيح OAuth لـ Google ومعرّف التاجر.',
                    'enable-module'         => 'تفعيل الوحدة',
                    'application-name'      => 'تعيين اسم تطبيق Google',
                    'google-api-key'        => 'مفتاح Google Oauth',
                    'google-api-secret-key' => 'مفتاح سر Google Oauth',
                    'google-merchant-id'    => 'معرّف تاجر متجر Google',
                ],

                'default' => [
                    'title'             => 'الإعداد الافتراضي',
                    'info'              => 'تعيين الفئة الافتراضية، وحدة الوزن، مجموعة العمر، توافر المنتج، الشروط والبلد المستهدف.',
                    'category'          => 'الفئة الافتراضية',
                    'category-info'     => 'استخدم تصنيف google مثل الملابس والإكسسوارات رابط https://support.google.com/merchants/answer/6324436?hl=ar',
                    'weight-unit'       => 'وحدة الوزن',
                    'new'               => 'جديد',
                    'old'               => 'مستعمل',
                    'male'              => 'ذكر',
                    'female'            => 'أنثى',
                    'kids'              => 'أطفال',
                    'adult'             => 'بالغ',
                    'child'             => 'طفل',
                    'age-group'         => 'الفئة العمرية',
                    'available-for'     => 'المنتج متاح لـ',
                    'product-condition' => 'حالة المنتج',
                    'tax-apply-on-ship' => 'تطبيق الضريبة على الشحن',
                    'tax-apply-as'      => 'تطبيق الضريبة على التسوق كـ',
                    'tax-rate'          => 'معدل الضريبة',
                    'target-country'    => 'البلد المستهدف',
                ],
            ],
        ],

        'layouts' => [
            'google-feed' => 'تغذية التسوق من Google',
            'category'    => 'تصنيف الخريطة',
            'product'     => 'المنتجات',
            'attribute'   => 'خريطة السمة',

            'settings'  => [
                'title'                 => 'تغذية التسوق من Google',
                'auth'                  => 'مصادقة الحساب',
                'auth-btn'              => 'المصادقة',
                'auth-refresh-btn'      => 'تحديث الرمز',
                'api-key'               => 'مفتاح API Oauth',
                'google-api-secret-key' => 'مفتاح سر Google Oauth',
                'api-secret-key'        => 'مفتاح سر API Oauth',
                'auth-success'          => 'تمت المصادقة بنجاح',
                'refreshed-token'       => 'تم تحديث الرمز بنجاح',
            ],
        ],

        'attribute' => [
            'title' => 'خريطة سمة المنتج من Google',
            
            'index' => [
                'product-id'      => 'معرّف المنتج',
                'title-id'        => 'العنوان',
                'description-id'  => 'الوصف',
                'gtin-id'         => 'GTIN',
                'brand-id'        => 'العلامة التجارية',
                'color-id'        => 'اللون',
                'weight-id'       => 'وزن الشحن',
                'image-id'        => 'رابط الصورة',
                'size-id'         => 'الحجم',
                'size-system-id'  => 'نظام الحجم',
                'size-type-id'    => 'نوع الحجم',
                'mpn-id'          => 'MPN',
                'save-btn-title'  => 'حفظ',
                'reset-btn-title' => 'تحديث',
            ],

            'save-success'   => 'تم حفظ السمات المخصصة بنجاح',
            'update-success' => 'تم تحديث السمات المخصصة بنجاح',
            'delete-success' => 'تم التحديث بنجاح',
            'delete-failed'  => 'خطأ! فشل الحذف.',
        ],

        'map-categories' => [
            'success-save'   => 'تم تخصيص الفئة بنجاح',
            'success-delete' => 'تم حذف الفئة المخصصة بنجاح',

            'index' => [
                'title'         => 'تخصيص فئات Google',
                'map-btn-title' => 'تخصيص فئة جديدة',

                'datagrid' => [
                    'id'          => 'المعرف',
                    'delete'      => 'حذف',
                    'store-name'  => 'اسم فئة المتجر',
                    'google-name' => 'اسم فئة Google',
                ],
            ],

            'create' => [
                'add-title'                     => 'تخصيص فئة جديدة',
                'refresh'                       => 'تحديث',
                'save'                          => 'حفظ',
                'select-category'               => 'اختر فئة',
                'entry-choose-bagisto-category' => 'اختر فئة المتجر',
                'entry-select-bagisto-category' => 'اختر فئة المتجر',
                'entry-choose-origin-category'  => 'اختر فئة Google',
            ],
        ],

        'product' => [
            'index'  => [
                'title'     => 'المنتجات المصدرة',
                'add-title' => 'إضافة صفحة CMS',
            ],

            'export' => [
                'title'       =>  'تصدير إلى متجر Google',
                'please-wait' => 'يرجى الانتظار. يتم تحميل المنتج.',
            ],

            'refresh'              => 'انتهت صلاحية رمز الوصول الخاص بك. يرجى تحديث رمز الوصول الخاص بك.',
            'something-went-wrong' => 'حدث خطأ ما. يرجى المحاولة مرة أخرى.',
            'map-attribute-failed' => 'الرجاء ربط السمات والمحاولة مرة أخرى.',
            'export-success'       => 'تم تصدير المنتجات بنجاح.',
        ],

        'store' => [
            'select-store-category'  => 'يرجى اختيار فئة المتجر',
            'select-google-category' => 'يرجى اختيار فئة Google',
        ],
    ],

    'acl' => [
        'google-feed' => 'تغذية Google Shopping',
        'category'    => 'تعيين الفئة',
        'product'     => 'المنتجات',
        'attribute'   => 'تعيين السمة',
        'refresh'     => 'تحديث',
        'destroy'     => 'تدمير',
        'export'      => 'تصدير',
        'create'      => 'إنشاء',
        'auth'        => 'المصادقة',
    ],
];