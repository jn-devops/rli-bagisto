<?php

return [
    /**
     * System Configuration.
     */
    [
        'key'  => 'bulkupload',
        'name' => 'bulkupload::app.admin.system.bulkupload.index.title',
        'info' => 'bulkupload::app.admin.system.bulkupload.index.info',
        'sort' => 5,
    ], [
        'key'  => 'bulkupload.settings',
        'name' => 'bulkupload::app.admin.system.bulkupload.setting.title',
        'info' => 'bulkupload::app.admin.system.bulkupload.setting.info',
        'icon' => 'settings/store.svg',
        'sort' => 1,
    ], [
        'key'    => 'bulkupload.settings.general',
        'name'   => 'bulkupload::app.admin.system.bulkupload.general',
        'sort'   => 1,
        'fields' => [
            [
                'name'          => 'status',
                'title'         => 'bulkupload::app.admin.system.status',
                'type'          => 'boolean',
                'channel_based' => true,
                'locale_based'  => false,
            ],
        ],
    ],
];
