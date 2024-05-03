<?php

return [
    /**
     * System Configuration.
     */
    [
        'key'  => 'blog',
        'name' => 'blog::app.config.settings.title',
        'info' => 'blog::app.config.settings.info',
        'sort' => 4,
    ], [
        'key'  => 'blog.settings',
        'name' => 'blog::app.config.settings.title',
        'info' => 'blog::app.config.settings.mega-info',
        'icon' => 'settings/store.svg',
        'sort' => 1,
    ], [
        'key'    => 'blog.settings.general',
        'name'   => 'blog::app.config.settings.general.title',
        'info'   => 'blog::app.config.settings.general.mega-info',
        'sort'   => 1,
        'fields' => [
            [
                'name'          => 'status',
                'title'         => 'blog::app.config.settings.general.status',
                'type'          => 'boolean',
                'channel_based' => true,
                'locale_based'  => false,
            ],
        ],
    ],
];
