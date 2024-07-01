<?php

return [
    [
        'key'    => 'google_feed',
        'name'   => 'google_feed::app.admin.configuration.settings.title',
        'info'   => 'google_feed::app.admin.configuration.settings.info',
        'sort'   => 6,
    ], [
        'key'    => 'google_feed.settings',
        'name'   => 'google_feed::app.admin.configuration.settings.general.title',
        'info'   => 'google_feed::app.admin.configuration.settings.general.info',
        'icon'   => 'settings/store.svg',   
        'sort'   => 1,
    ], [
        'key'    => 'google_feed.settings.general',
        'name'   => 'google_feed::app.admin.configuration.settings.general.title',
        'info'   => 'google_feed::app.admin.configuration.settings.general.info',
        'sort'   => 1,
        'fields' => [
            [
                'name'          => 'package_status',
                'title'         => 'google_feed::app.admin.configuration.settings.general.enable-module',
                'type'          => 'boolean',
                'channel_based' => true,
            ], [
                'name'          => 'application_name',
                'title'         => 'google_feed::app.admin.configuration.settings.general.application-name',
                'type'          => 'text',
                'locale_based'  => true,
                'channel_based' => true,
            ], [
                'name'          => 'google_api_key',
                'title'         => 'google_feed::app.admin.configuration.settings.general.google-api-key',
                'type'          => 'text',
                'channel_based' => true,
            ], [
                'name'          => 'google_api_secret_key',
                'title'         => 'google_feed::app.admin.configuration.settings.general.google-api-secret-key',
                'type'          => 'password',
                'channel_based' => true,
            ], [
                'name'          => 'google_merchant_id',
                'title'         => 'google_feed::app.admin.configuration.settings.general.google-merchant-id',
                'type'          => 'text',
                'channel_based' => true,
            ],
        ],
    ], [
        'key'    => 'google_feed.settings.default_configuration',
        'name'   => 'google_feed::app.admin.configuration.settings.default.title',
        'info'   => 'google_feed::app.admin.configuration.settings.default.info',
        'sort'   => 2,
        'fields' => [
            [
                'name'          => 'category',
                'title'         => 'google_feed::app.admin.configuration.settings.default.category',
                'type'          => 'text',
                'validation'    => 'required',
                'info'          => 'google_feed::app.admin.configuration.settings.default.category-info',
                'channel_based' => true,
            ], [
                'name'          => 'weight_unit',
                'title'         => 'google_feed::app.admin.configuration.settings.default.weight-unit',
                'type'          => 'select',
                'channel_based' => true,
                'options'       => [
                    [
                        'title' => 'lbs',
                        'value' => 'lb',
                    ], [
                        'title' => 'kgs',
                        'value' => 'kg',
                    ],
                ],
            ], [
                'name'          => 'age_group',
                'title'         => 'google_feed::app.admin.configuration.settings.default.age-group',
                'type'          => 'select',
                'validation'    => 'required',
                'channel_based' => true,
                'options'       => [
                    [
                        'title' => 'google_feed::app.admin.configuration.settings.default.adult',
                        'value' => 'adult',
                    ], [
                        'title' => 'google_feed::app.admin.configuration.settings.default.child',
                        'value' => 'child',
                    ],
                ],
            ], [
                'name'          => 'available_for',
                'title'         => 'google_feed::app.admin.configuration.settings.default.available-for',
                'type'          => 'select',
                'validation'    => 'required',
                'channel_based' => true,
                'options'       => [
                    [
                        'title' => 'google_feed::app.admin.configuration.settings.default.male',
                        'value' => 'male',
                    ], [
                        'title' => 'google_feed::app.admin.configuration.settings.default.female',
                        'value' => 'female',
                    ], [
                        'title' => 'google_feed::app.admin.configuration.settings.default.kids',
                        'value' => 'kids',
                    ],
                ],
            ], [
                'name'          => 'condition',
                'title'         => 'google_feed::app.admin.configuration.settings.default.product-condition',
                'type'          => 'select',
                'validation'    => 'required',
                'channel_based' => true,
                'options'    => [
                    [
                        'title' => 'google_feed::app.admin.configuration.settings.default.new',
                        'value' => 'new',
                    ], [
                        'title' => 'google_feed::app.admin.configuration.settings.default.old',
                        'value' => 'old',
                    ],
                ],
            ], [
                'name'       => 'target_country',
                'title'      => 'google_feed::app.admin.configuration.settings.default.target-country',
                'type'       => 'select',
                'validation' => 'required',
                'repository' => 'Webkul\GoogleShoppingFeed\Repositories\OAuthAccessTokenRepository@getCountries',
            ],
        ],
    ],
];