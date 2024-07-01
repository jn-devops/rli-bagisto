<?php

return [
    'admin' => [
        'configuration' => [
            'settings' => [
                'title' => 'Поток Google Shopping',
                'info'  => 'Поток Google Shopping',

                'general' => [
                    'title'                 => 'Общее',
                    'info'                  => 'Установите статус модуля, название приложения Google, ключи OAuth Google и идентификатор торговца.',
                    'enable-module'         => 'Включить модуль',
                    'application-name'      => 'Установите имя приложения Google',
                    'google-api-key'        => 'Ключ Google OAuth',
                    'google-api-secret-key' => 'Секретный ключ Google OAuth',
                    'google-merchant-id'    => 'Идентификатор торговца Google Shop',
                ],

                'default' => [
                    'title'             => 'Конфигурация по умолчанию',
                    'info'              => 'Установите категорию по умолчанию, единицу веса, возрастную группу, наличие продукции, условия и целевую страну.',
                    'category'          => 'Категория по умолчанию',
                    'category-info'     => 'Используйте таксономию Google, например, "Одежда и аксессуары" (https://support.google.com/merchants/answer/6324436?hl=ru)',
                    'weight-unit'       => 'Единица веса',
                    'new'               => 'Новый',
                    'old'               => 'Старый',
                    'male'              => 'Мужской',
                    'female'            => 'Женский',
                    'kids'              => 'Дети',
                    'adult'             => 'Взрослый',
                    'child'             => 'Ребенок',
                    'age-group'         => 'Возрастная группа',
                    'available-for'     => 'Продукт доступен для',
                    'product-condition' => 'Состояние продукта',
                    'tax-apply-on-ship' => 'Применить налог при отправке',
                    'tax-apply-as'      => 'Применить налог на покупки как',
                    'tax-rate'          => 'Ставка налога',
                    'target-country'    => 'Целевая страна',
                ],
            ],
        ],

        'layouts' => [
            'google-feed' => 'Поток Google Shopping',
            'category'    => 'Категория на карте',
            'product'     => 'Продукты',
            'attribute'   => 'Атрибут на карте',

            'settings' => [
                'title'                 => 'Поток Google Shopping',
                'auth'                  => 'Аутентификация учетной записи',
                'auth-btn'              => 'Аутентифицировать',
                'auth-refresh-btn'      => 'Обновить токен',
                'api-key'               => 'Ключ API OAuth',
                'google-api-secret-key' => 'Секретный ключ Google OAuth',
                'api-secret-key'        => 'Секретный ключ API OAuth',
                'auth-success'          => 'Успешная аутентификация',
                'refreshed-token'       => 'Токен доступа успешно обновлен',
            ],
        ],

        'attribute' => [
            'title' => 'Отобразить атрибуты продуктов Google',
            
            'index' => [
               'product-id'      => 'Идентификатор продукта',
                'title-id'        => 'Название',
                'description-id'  => 'Описание',
                'gtin-id'         => 'GTIN',
                'brand-id'        => 'Бренд',
                'color-id'        => 'Цвет',
                'weight-id'       => 'Вес доставки',
                'image-id'        => 'Ссылка на изображение',
                'size-id'         => 'Размер',
                'size-system-id'  => 'Система размеров',
                'size-type-id'    => 'Тип размера',
                'mpn-id'          => 'MPN',
                'save-btn-title'  => 'СОХРАНИТЬ',
                'reset-btn-title' => 'Обновить',
            ],

            'save-success'   => 'Отображенные атрибуты успешно сохранены',
            'update-success' => 'Отображенные атрибуты успешно обновлены',
            'delete-success' => 'Успешно обновлено',
            'delete-failed'  => 'Ошибка! Удаление не удалось.',
        ],

        'map-categories' => [
            'success-save'   => 'Категория успешно отображена',
            'success-delete' => 'Отображенная категория успешно удалена',

            'index' => [
                'title'         => 'Отобразить категории Google',
                'map-btn-title' => 'Отобразить новую категорию',

                'datagrid' => [
                    'id'          => 'Id',
                    'delete'      => 'Удалить',
                    'store-name'  => 'Название категории магазина',
                    'google-name' => 'Название категории Google',
                ],
            ],

            'create' => [
                'add-title'                     => 'Отобразить новую категорию',
                'refresh'                       => 'Обновить',
                'save'                          => 'Сохранить',
                'select-category'               => 'Выберите категорию',
                'entry-choose-bagisto-category' => 'Выберите категорию магазина',
                'entry-select-bagisto-category' => 'Выберите категорию магазина',
                'entry-choose-origin-category'  => 'Выберите категорию Google',
            ],
        ],

        'product' => [
            'index'  => [
                'title'     => 'Экспортированные продукты',
                'add-title' => 'Добавить страницу CMS',
            ],

            'export' => [
                'title'       => 'Экспорт в Google Shop',
                'please-wait' => 'Подождите. Продукт загружается.',
            ],

            'refresh'              => 'Ваш токен доступа истек. Пожалуйста, обновите ваш токен.',
            'something-went-wrong' => 'Что-то пошло не так. Пожалуйста, попробуйте еще раз.',
            'map-attribute-failed' => 'Пожалуйста, сопоставьте атрибуты и повторите попытку.',
            'export-success'       => 'Продукты успешно экспортированы.',
        ],

        'store' => [
            'select-store-category'  => 'Пожалуйста, выберите категорию магазина',
            'select-google-category' => 'Пожалуйста, выберите категорию Google',
        ],
    ],

    'acl' => [
        'google-feed' => 'Поток Google Shopping',
        'category'    => 'Категория на карте',
        'product'     => 'Продукты',
        'attribute'   => 'Атрибут на карте',
        'refresh'     => 'Обновить',
        'destroy'     => 'Уничтожить',
        'export'      => 'Экспорт',
        'create'      => 'Создать',
        'auth'        => 'Аутентификация',
    ],
];