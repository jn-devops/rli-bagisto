<?php

return [
    'admin' => [
        /**
         * System Configuration.
         */
        'system'      => [
            'bulkUpload' => [
                'general'   => 'General',
                'index'     => [
                    'title' => 'Bulk-Upload Product',
                    'info'  => 'Configure',
                ],
                'setting' => [
                    'title' => 'Settings',
                    'info'  => 'Update status',
                ],
            ],
            'status'     => 'Status',
        ],

        /**
         * Bulk product configuration
         */
        'bulk-upload' => [
            'index'              => 'Bulk-Upload',
            'manage-bulk-upload' => 'Manage Bulk Upload',

            'bulk-product-importer' => [
                'grid'           => 'Profile Grid',
                'name'           => 'Name',
                'family'         => 'Attribute Family',
                'locale'         => 'Default Locale',
                'index'          => 'Bulk Product Importer',
                'upload'         => 'Upload',
                'add-profile'    => 'Add Profile',
                'edit-profile'   => 'Edit Profile',
                'update-profile' => 'Update',
                'data-grid'      => [
                    'created-at'  => 'Created At',
                    'locale_code' => 'Locale code',
                ],
            ],

            /**
             * Run profiler configuration
             */
            'run-profile' => [
                'upload-product-time'     => 'Time Taken',
                'run'                     => 'Import Products',
                'index'                   => 'Run Profile',
                'finish'                  => 'Finished Profile Execution',
                'run-command'             => 'Import Products In BackGround',
                'select-file'             => 'Select File',
                'please-select'           => 'Please Select',
                'error-in-product'        => 'Error while product uploading',
                'uploaded-product'        => 'Newly uploaded products',
                'download'                => 'Download',
                'uploaded-product-info'   => 'Anticipate fresh outcomes once the profile run is complete.',
                'products-uploaded'       => 'Newly uploaded products',
                'image-not-found'         => 'The image could not be located at the provided CDN link',
                'product-not-upload'      => 'Record Not Upload',
                'product-not-upload-info' => 'Category Name, Category Slug, Reason',
                'result-not-found'        => 'Result Not Found!',
            ],

            'upload-file' => [
                'delete'        => 'Delete File',
                'download-file' => 'Download CSV',
            ],

            /**
             * Upload product files configuration
             */
            'upload-files' => [
                'file'                     => 'CSV/XLS/XLSX file',
                'save'                     => 'Save',
                'index'                    => 'Upload Files',
                'image'                    => 'Image Zip file',
                'download'                 => 'Download',
                'upload-file'              => 'Upload Files',
                'csv-file'                 => 'Sample :filetype CSV File',
                'xls-file'                 => 'Sample :filetype XLS File',
                'sample-links'             => 'Is Links have samples',
                'download-sample'          => 'Download Sample',
                'sample-file'              => 'Sample Files',
                'import-products'          => 'Import Products',
                'is-downloadable'          => 'Is downloadable have files',
                'sample-available'         => 'Is Samples available',
                'upload-link-files'        => 'Upload Link Files',
                'upload-sample-files'      => 'Upload Sample Files',
                'upload-link-sample-files' => 'Upload Link Sample Files',
                'upload-product-time'      => 'Time Taken',
                'uploaded-product'         => 'Uploaded Product',
                'not-uploaded-product'     => 'Not Uploaded Product',
                'profiler-name'            => 'Profiler Name',
                'csv-link'                 => 'CSV Link',
                'date-and-time'            => 'Date & Time',
                'delete-file'              => 'Delete File',
                'delete-message'           => 'File deleted successfully',
                'no-record-found'          => 'No Record Found!',
            ],

            'messages' => [
                'profile-saved'             => 'Profile added successfully',
                'update-profile'            => 'Profile updated successfully',
                'product-not-supported'     => 'Booking product not supported this module',
                'profile-deleted'           => 'Profile deleted successfully',
                'file-format-error'         => 'Invalid File Extension',
                'all-profile-deleted'       => 'All the selected profiles have been deleted successfully',
                'data-profile-not-selected' => 'Bulk Product Importer not selected',
            ],
        ],
    ],

    'shop' => [
        'bulk-upload' => [
            'checkout' => [
                'title'          => 'Properly Map',
                'code'           => 'Property Code',
                'authentication' => 'Authentication',
                'onepage'        => [
                    'processing_fee' => 'Processing Fee',
                ],
            ],
        ],
    ],
];
