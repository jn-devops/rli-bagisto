<?php

return [
    'admin' => [
        'configuration' => [
            'settings' => [
                'title' => 'गूगल शॉपिंग फीड',
                'info'  => 'गूगल शॉपिंग फीड के बारे में',
            
                'general' => [
                    'title'                 => 'सामान्य',
                    'info'                  => 'मॉड्यूल स्थिति सेट करें, गूगल एप्लिकेशन नाम, गूगल OAuth कुंजी और व्यापारी आईडी।',
                    'enable-module'         => 'मॉड्यूल सक्षम करें',
                    'application-name'      => 'Google एप्लिकेशन का नाम सेट करें',
                    'google-api-key'        => 'गूगल ओथ कुंजी',
                    'google-api-secret-key' => 'गूगल ओथ गुप्त कुंजी',
                    'google-merchant-id'    => 'गूगल शॉप मर्चेंट आईडी',
                ],

                'default' => [
                    'title'             => 'डिफ़ॉल्ट कॉन्फ़िगरेशन',
                    'info'              => 'डिफ़ॉल्ट श्रेणी, वजन इकाई, आयु समूह, उत्पाद उपलब्धता, शर्तें और लक्ष्य देश को सेट करें।',
                    'category'          => 'डिफ़ॉल्ट श्रेणी',
                    'category-info'     => 'गूगल वर्गीकरण का उपयोग करें जैसे कि वस्त्र और सामान लिंक https://support.google.com/merchants/answer/6324436?hl=en',
                    'weight-unit'       => 'वजन इकाई',
                    'new'               => 'नया',
                    'old'               => 'पुराना',
                    'male'              => 'पुरुष',
                    'female'            => 'महिला',
                    'kids'              => 'बच्चे',
                    'adult'             => 'वयस्क',
                    'child'             => 'बच्चा',
                    'age-group'         => 'आयु समूह',
                    'available-for'     => 'उत्पाद उपलब्ध है',
                    'product-condition' => 'उत्पाद की स्थिति',
                    'tax-apply-on-ship' => 'शिप पर टैक्स लागू करें',
                    'tax-apply-as'      => 'शॉपिंग टैक्स लागू करें',
                    'tax-rate'          => 'कर की दर',
                    'target-country'    => 'लक्ष्य देश',
                ],
            ],
        ],

        'layouts' => [
            'google-feed' => 'गूगल शॉपिंग फीड',
            'category'    => 'श्रेणी मैप करें',
            'product'     => 'उत्पाद',
            'attribute'   => 'विशेषता मैप करें',

            'settings' => [
                'title'                 => 'गूगल शॉपिंग फीड',
                'auth'                  => 'खाते को प्रमाणित करें',
                'auth-btn'              => 'प्रमाणित करें',
                'auth-refresh-btn'      => 'टोकन ताज़ा करें',
                'api-key'               => 'ओथ एपीआई कुंजी',
                'google-api-secret-key' => 'गूगल ओथ गुप्त कुंजी',
                'api-secret-key'        => 'ओथ एपीआई गुप्त कुंजी',
                'auth-success'          => 'सफलतापूर्वक प्रमाणित किया गया',
                'refreshed-token'       => 'पहुँच टोकन सफलतापूर्वक ताज़ा किया गया',
            ],
        ],

        'attribute' => [
            'title' => 'गूगल उत्पाद विशेषता मैप करें',
            
            'index' => [
                'product-id'      => 'उत्पाद आईडी',
                'title-id'        => 'शीर्षक',
                'description-id'  => 'विवरण',
                'gtin-id'         => 'जीटीआईएन',
                'brand-id'        => 'ब्रांड',
                'color-id'        => 'रंग',
                'weight-id'       => 'शिपिंग वजन',
                'image-id'        => 'छवि लिंक',
                'size-id'         => 'आकार',
                'size-system-id'  => 'आकार प्रणाली',
                'size-type-id'    => 'आकार प्रकार',
                'mpn-id'          => 'एमपीएन',
                'save-btn-title'  => 'सहेजें',
                'reset-btn-title' => 'ताज़ा करें',
            ],

            'save-success'   => 'मैप की गई विशेषताएँ सफलतापूर्वक सहेजी गईं',
            'update-success' => 'मैप की गई विशेषताएँ सफलतापूर्वक अपडेट की गईं',
            'delete-success' => 'सफलतापूर्वक ताज़ा किया गया',
            'delete-failed'  => 'त्रुटि! हटाना विफल रहा।',
        ],

        'map-categories' => [
            'success-save'   => 'श्रेणी सफलतापूर्वक मैप की गई',
            'success-delete' => 'मैप की गई श्रेणी सफलतापूर्वक हटा दी गई',
            
            'index' => [
                'title'         => 'गूगल श्रेणियों को मैप करें',
                'map-btn-title' => 'नई श्रेणी मैप करें',

                'datagrid' => [
                    'id'          => 'आईडी',
                    'delete'      => 'हटाएं',
                    'store-name'  => 'स्टोर श्रेणी का नाम',
                    'google-name' => 'गूगल श्रेणी का नाम',
                ],
            ],

            'create' => [
                'add-title'                     => 'नई श्रेणी मैप करें',
                'refresh'                       => 'ताज़ा करें',
                'save'                          => 'सहेजें',
                'select-category'               => 'श्रेणी का चयन करें',
                'entry-choose-bagisto-category' => 'स्टोर श्रेणी चुनें',
                'entry-select-bagisto-category' => 'स्टोर श्रेणी का चयन करें',
                'entry-choose-origin-category'  => 'गूगल श्रेणी चुनें',
            ],
        ],

        'product' => [
            'index'  => [
                'title'     => 'निर्यात किए गए उत्पाद',
                'add-title' => 'सीएमएस पृष्ठ जोड़ें',
            ],

            'export' => [
                'title'       => 'Google शॉप में निर्यात करें',
                'please-wait' => 'कृपया प्रतीक्षा करें। उत्पाद अपलोड हो रहा है।',
            ],

            'refresh'              => 'आपका एक्सेस टोकन समाप्त हो गया है। कृपया अपना टोकन रिफ़्रेश करें।',
            'something-went-wrong' => 'कुछ गड़बड़ हो गई है। कृपया पुन: प्रयास करें।',
            'map-attribute-failed' => 'कृपया गुण संबंधित आवश्यकताओं को मानचित्रित करें और पुन: प्रयास करें।',
            'export-success'       => 'उत्पाद सफलतापूर्वक निर्यात किए गए।',
        ],

        'store' => [
            'select-store-category'  => 'कृपया स्टोर श्रेणी का चयन करें',
            'select-google-category' => 'कृपया गूगल श्रेणी का चयन करें',
        ],
    ],

    'acl' => [
        'google-feed' => 'गूगल शॉपिंग फ़ीड',
        'category'    => 'मैप श्रेणी',
        'product'     => 'उत्पाद',
        'attribute'   => 'मैप गुण',
        'refresh'     => 'ताज़ा करें',
        'destroy'     => 'नष्ट करें',
        'export'      => 'निर्यात',
        'create'      => 'बनाएं',
        'auth'        => 'प्रमाणीकरण करें',
    ],
];