<?php

return [
    /**
     * System Configuration.
     */
    [
        'key'  => 'bulkUpload',
        'name' => 'bulkUpload::app.admin.system.bulkUpload.index.title',
        'info' => 'bulkUpload::app.admin.system.bulkUpload.index.info',
        'sort' => 5,
    ], [
        'key'  => 'bulkUpload.settings',
        'name' => 'bulkUpload::app.admin.system.bulkUpload.setting.title',
        'info' => 'bulkUpload::app.admin.system.bulkUpload.setting.info',
        'icon' => 'settings/store.svg',
        'sort' => 1,
    ], [
        'key'    => 'bulkUpload.settings.general',
        'name'   => 'bulkUpload::app.admin.system.bulkUpload.general',
        'sort'   => 1,
        'fields' => [
            [
                'name'          => 'status',
                'title'         => 'bulkUpload::app.admin.system.status',
                'type'          => 'boolean',
                'channel_based' => true,
                'locale_based'  => false,
            ],
        ],
    ],
];
