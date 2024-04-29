<?php

return [
    /**
     * Admin menu configuration.
     */
    [
        'key'   => 'bulkUpload',
        'name'  => 'bulkUpload::app.admin.bulk-upload.manage-bulk-upload',
        'route' => 'admin.bulk-upload.bulk-product-importer.index',
        'sort'  => 4,
        'icon'  => 'icon-cms',
    ], [
        'key'   => 'bulkUpload.bulk-product-importer-profile',
        'name'  => 'bulkUpload::app.admin.bulk-upload.bulk-product-importer.index',
        'route' => 'admin.bulk-upload.bulk-product-importer.index',
        'sort'  => 1,
        'icon'  => '',
    ], [
        'key'   => 'bulkUpload.upload-files',
        'name'  => 'bulkUpload::app.admin.bulk-upload.bulk-product-importer.upload',
        'route' => 'admin.bulk-upload.upload-file.index',
        'sort'  => 2,
        'icon'  => '',
    ], [
        'key'   => 'bulkUpload.run-profile',
        'name'  => 'bulkUpload::app.admin.bulk-upload.run-profile.index',
        'route' => 'admin.bulk-upload.import-file.run-profile.index',
        'sort'  => 3,
        'icon'  => '',
    ],
];
