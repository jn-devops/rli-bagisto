<?php

return [
    'admin' => [
        'configuration' => [
            'settings' => [
                'title' => 'Google Shopping Feed',
                'info'  => 'Google Shopping Feed',

                'general' => [
                    'title'                 => 'General',
                    'info'                  => 'Set module status, google application name, google OAuth keys and Merchant Id.',
                    'enable-module'         => 'Enable Module',
                    'application-name'      => 'Set Google Application name',
                    'google-api-key'        => 'Google Oauth Key',
                    'google-api-secret-key' => 'Google Oauth Secret Key',
                    'google-merchant-id'    => 'Google Shop Merchant ID',
                ],

                'default' => [
                    'title'             => 'Default Configuration',
                    'info'              => 'Set default category, weight unit, age group, product availability, conditions and target country.',
                    'category'          => 'Default Category',
                    'category-info'     => 'Use google taxonomy i.e Apparel & Accessories link https://support.google.com/merchants/answer/6324436?hl=en',
                    'weight-unit'       => 'Weight Unit',
                    'new'               => 'New',
                    'old'               => 'Old',
                    'male'              => 'Male',
                    'female'            => 'Female',
                    'kids'              => 'Kids',
                    'adult'             => 'Adult',
                    'child'             => 'Child',
                    'age-group'         => 'Age Group',
                    'available-for'     => 'Product Available For',
                    'product-condition' => 'Product Condition',
                    'tax-apply-on-ship' => 'Tax Apply On Ship',
                    'tax-apply-as'      => 'Shopping Tax Apply As',
                    'tax-rate'          => 'Tax Rate',
                    'target-country'    => 'Target Country',
                ],
            ],
        ],

        'layouts' => [
            'google-feed' => 'Google Shopping Feed',
            'category'    => 'Map Category',
            'product'     => 'Products',
            'attribute'   => 'Map Attribute',

            'settings' => [
                'title'                 => 'Google Shopping Feed',
                'auth'                  => 'Authenticate Account',
                'auth-btn'              => 'Authenticate',
                'auth-refresh-btn'      => 'Refresh Token',
                'api-key'               => 'Oauth API Key',
                'google-api-secret-key' => 'Google Oauth Secret Key',
                'api-secret-key'        => 'Oauth API Secret Key',
                'auth-success'          => 'Authenticated successfully.',
                'refreshed-token'       => 'Access token has been refresh successfully.',
            ],
        ],

        'attribute' => [
            'title' => 'Map Google Product Attribute',
            
            'index' => [
                'product-id'      => 'Product ID',
                'title-id'        => 'Title',
                'description-id'  => 'Description',
                'gtin-id'         => 'GTIN',
                'brand-id'        => 'Brand',
                'color-id'        => 'Color',
                'weight-id'       => 'Shipping Weight',
                'image-id'        => 'Image link',
                'size-id'         => 'Size',
                'size-system-id'  => 'Size System',
                'size-type-id'    => 'Size Type',
                'mpn-id'          => 'MPN',
                'save-btn-title'  => 'SAVE',
                'reset-btn-title' => 'Reset',
            ],

            'save-success'   => 'Mapped attributes saved successfully.',
            'update-success' => 'Mapped attributes updated successfully.',
            'delete-success' => 'Mapped attributes Deleted successfully.',
            'delete-failed'  => 'Error! Delete failed.',
        ],

        'map-categories' => [
            'success-save'   => 'Category mapped successfully.',
            'success-delete' => 'Mapped category has been deleted successfully.',

            'index' => [
                'title'         => 'Map Google Categories',
                'map-btn-title' => 'Map new Category',

                'datagrid' => [
                    'id'          => 'Id',
                    'delete'      => 'Delete',
                    'store-name'  => 'Store Category Name',
                    'google-name' => 'Google Category Name',
                ],
            ],

            'create' => [
                'add-title'                     => 'Map New Category',
                'refresh'                       => 'Refresh',
                'save'                          => 'Save',
                'select-category'               => 'Select Category',
                'entry-choose-bagisto-category' => 'Choose Store Category',
                'entry-select-bagisto-category' => 'Select store category',
                'entry-choose-origin-category'  => 'Choose Google Category',
            ],
        ],

        'product' => [
            'index'  => [
                'title'     => 'Exported Products',
                'add-title' => 'Add CMS Page',
            ],

            'export' => [
                'title'       => 'Export to Google Shop',
                'please-wait' => 'Please wait. Product is uploading.',
            ],

            'refresh'              => 'Your access token has been expired. Please refresh your token.',
            'something-went-wrong' => 'Something went wrong. Please try again.',
            'map-attribute-failed' => 'Please map the attributes and try again.',
            'export-success'       => 'Products exported successfully.',
        ],

        'store' => [
            'select-store-category'  => 'Please select store category',
            'select-google-category' => 'Please select google category',
        ],
    ],

    'acl' => [
        'google-feed' => 'Google Shopping Feed',
        'category'    => 'Map Category',
        'product'     => 'Products',
        'attribute'   => 'Map Attribute',
        'refresh'     => 'Refresh',
        'destroy'     => 'destroy',
        'export'      => 'Export',
        'create'      => 'create',
        'auth'        => 'Authenticate',
    ],
];