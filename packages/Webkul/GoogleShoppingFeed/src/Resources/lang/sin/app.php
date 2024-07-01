<?php

return [
    'admin' => [
        'configuration' => [
            'settings' => [
                'title' => 'ගූගල් ෂොපින් ෆීඩ්',
                'info'  => 'ගූගල් ෂොපින් ෆීඩ්',

                'general' => [
                    'title'                 => 'සාමාන්‍ය',
                    'info'                  => 'සැකසුම් අතර මොඩියුල් තත්වය, ගූගල් යෙදුම් නම, ගූගල් OAuth යතුරු සහ ස්ථානයේ හඳුනා ගන්න.',
                    'enable-module'         => 'මොඩියුලය සක්‍රීය කරන්න',
                    'application-name'      => 'ගූගල් යෙදුම් නාමය සකසන්න',
                    'google-api-key'        => 'ගූගල් ඔත් කී',
                    'google-api-secret-key' => 'ගූගල් ඔත් රහස් කී',
                    'google-merchant-id'    => 'ගූගල් ෂොප් වෙළෙඳුන් අංකය',
                ],

                'default' => [
                    'title'             => 'පෙරනිමි වින්‍යාසය',
                    'info'              => 'පෙරනිමි ප්‍රවර්ගය, බර ඒකකය, වලාකුළු කලාපය, නිෂ්පාදනය සහ ඉඩමේ නිලධාරි රැකගත් රෝග, නිර්දේශය සිටම.',
                    'category'          => 'පෙරනිමි කාණ්ඩය',
                    'category-info'     => 'ගූගල් වර්ගීකරණය භාවිතා කරන්න. උදා: ඇඳුම් සහ උපාංග link https://support.google.com/merchants/answer/6324436?hl=en',
                    'weight-unit'       => 'බර ඒකකය',
                    'new'               => 'නව',
                    'old'               => 'පැරණි',
                    'male'              => 'පිරිමි',
                    'female'            => 'ගැහැණු',
                    'kids'              => 'දරුවන්',
                    'adult'             => 'වැඩිහිටි',
                    'child'             => 'ළමා',
                    'age-group'         => 'වයස් කාණ්ඩය',
                    'available-for'     => 'නිෂ්පාදනය ලබා ගත හැකි',
                    'product-condition' => 'නිෂ්පාදන තත්වය',
                    'tax-apply-on-ship' => 'බදු යොදා ගැනීම නැව් ගාස්තුවට',
                    'tax-apply-as'      => 'බදු අය කිරීමේ ආකාරය',
                    'tax-rate'          => 'බදු අනුපාතය',
                    'target-country'    => 'ඉලක්ක රට',
                ],
            ],
        ],

        'layouts' => [
            'google-feed' => 'ගූගල් ෂොපින් ෆීඩ්',
            'category'    => 'කාණ්ඩය සිතියම් කරන්න',
            'product'     => 'නිෂ්පාදන',
            'attribute'   => 'ගුණාංග සිතියම් කරන්න',

            'settings' => [
                'title'                 => 'ගූගල් ෂොපින් ෆීඩ්',
                'auth'                  => 'ගිණුම සත්‍යාපනය කරන්න',
                'auth-btn'              => 'සත්‍යාපනය කරන්න',
                'auth-refresh-btn'      => 'ටෝකනය නැවත ප්‍රවේශ කරන්න',
                'api-key'               => 'Oauth API යතුර',
                'google-api-secret-key' => 'ගූගල් Oauth රහස් යතුර',
                'api-secret-key'        => 'Oauth API රහස් යතුර',
                'auth-success'          => 'සාර්ථකව සත්‍යාපනය විය',
                'refreshed-token'       => 'ප්‍රවේශ ටෝකනය සාර්ථකව නැවත ප්‍රවේශ කරන ලදී',
            ],
        ],

        'attribute' => [
            'title' => 'ගූගල් නිෂ්පාදන ගුණාංග සිතියම් කරන්න',
            
            'index' => [
                'product-id'      => 'නිෂ්පාදන ID',
                'title-id'        => 'ශීර්ෂය',
                'description-id'  => 'විස්තර',
                'gtin-id'         => 'GTIN',
                'brand-id'        => 'නාමය',
                'color-id'        => 'වර්ණය',
                'weight-id'       => 'නැව් බර',
                'image-id'        => 'රූප සබැඳිය',
                'size-id'         => 'ප්‍රමාණය',
                'size-system-id'  => 'ප්‍රමාණ පද්ධතිය',
                'size-type-id'    => 'ප්‍රමාණ වර්ගය',
                'mpn-id'          => 'MPN',
                'save-btn-title'  => 'සුරකින්න',
                'reset-btn-title' => 'නැවත ප්‍රවේශ කරන්න',
            ],

            'save-success'   => 'ගුණාංග සිතියම් කිරීම සාර්ථකව සුරැකුණි',
            'update-success' => 'ගුණාංග සිතියම් කිරීම සාර්ථකව යාවත්කාලීන කෙරිණි',
            'delete-success' => 'සාර්ථකව නැවත ප්‍රවේශනය විය',
            'delete-failed'  => 'දෝෂයකි! මකා දැමීම අසාර්ථක විය.',
        ],

        'map-categories' => [
            'success-save'   => 'කාණ්ඩය සාර්ථකව සිතියම් කරන ලදී',
            'success-delete' => 'සිතියම් කරන ලද කාණ්ඩය සාර්ථකව මකා දමා ඇත',
            
            'index' => [
                'title'         => 'ගූගල් කාණ්ඩ සිතියම් කරන්න',
                'map-btn-title' => 'නව කාණ්ඩයක් සිතියම් කරන්න',

                'datagrid' => [
                    'id'          => 'අංකය',
                    'delete'      => 'මකන්න',
                    'store-name'  => 'වෙළඳසැල් කාණ්ඩ නාමය',
                    'google-name' => 'ගූගල් කාණ්ඩ නාමය',
                ],
            ],

            'create' => [
                'add-title'                     => 'නව කාණ්ඩයක් සිතියම් කරන්න',
                'refresh'                       => 'නැවත ප්‍රවේශ කරන්න',
                'save'                          => 'සුරකින්න',
                'select-category'               => 'කාණ්ඩය තෝරන්න',
                'entry-choose-bagisto-category' => 'වෙළඳසැල් කාණ්ඩය තෝරන්න',
                'entry-select-bagisto-category' => 'වෙළඳසැල් කාණ්ඩය තෝරන්න',
                'entry-choose-origin-category'  => 'ගූගල් කාණ්ඩය තෝරන්න',
            ],
        ],

        'product' => [
            'index'  => [
                'title'     => 'නිකුත් කරන ලද නිෂ්පාදන',
                'add-title' => 'CMS පිටුවක් එක් කරන්න',
            ],

            'export' => [
                'title'       => 'Google සොප්ප් වෙත අප්‍රත්තු කරන්න',
                'please-wait' => 'කරුණාකර ඉවසන්න. නිෂ්පාදනය උඩුගත කරන ලදී.',
            ],

           'refresh'               => 'ඔබගේ ප්‍රවේශ ටෝකනය වැරදි විය. කරුණාකර ඔබේ ටෝකනය නැවත සුරකින්න.',
            'something-went-wrong' => 'යම් වැරදි විය. කරුණාකර නැවත උත්සහා කරන්න.',
            'map-attribute-failed' => 'කරුණාකර ගුණ ප්‍රකාශ කර නැවත උත්සහා කරන්න.',
            'export-success'       => 'නිෂ්පාදනය සාර්ථකව කල යුතුයි.',
        ],

        'store' => [
            'select-store-category'  => 'කරුණාකර වෙළඳසැල් කාණ්ඩය තෝරන්න',
            'select-google-category' => 'කරුණාකර ගූගල් කාණ්ඩය තෝරන්න',
        ],
    ],

    'acl' => [
       'google-feed' => 'ගූගල් ගිසින් ප්‍රවාහනය',
       'category'    => 'සිතියම අනුපාතය',
       'product'     => 'නිෂ්පාදන',
       'attribute'   => 'සිතියම අනුපාතය',
       'refresh'     => 'නැවත ප්‍රවාහනය කරන්න',
       'destroy'     => 'විනාඩියක්',
       'export'      => 'අපනය',
       'create'      => 'නිර්මාණය',
       'auth'        => 'සත්කාරකවරුන්',
    ],
];