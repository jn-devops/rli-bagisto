<?php

return [
    'admin' => [
        'configuration' => [
            'settings' => [
                'title' => 'Канал покупок Google',
                'info'  => 'Канал покупок Google',

                'general' => [
                    'title'                 => 'Загальні',
                    'info'                  => 'Встановіть статус модуля, назву додатка Google, ключі OAuth Google та ідентифікатор продавця.',
                    'enable-module'         => 'Увімкнути модуль',
                    'application-name'      => 'Встановіть назву програми Google',
                    'google-api-key'        => 'Ключ Google Oauth',
                    'google-api-secret-key' => 'Секретний ключ Google Oauth',
                    'google-merchant-id'    => 'ID торговця Google Shop',
                ],

                'default' => [
                    'title'             => 'Конфігурація за замовчуванням',
                    'info'              => 'Встановіть типову категорію, одиницю виміру ваги, вікову групу, доступність продукту, умови і цільову країну.',
                    'category'          => 'Категорія за замовчуванням',
                    'category-info'     => 'Використовуйте таксономію google, наприклад Одяг та аксесуари посилання https://support.google.com/merchants/answer/6324436?hl=en',
                    'weight-unit'       => 'Одиниця ваги',
                    'new'               => 'Новий',
                    'old'               => 'Старий',
                    'male'              => 'Чоловік',
                    'female'            => 'Жінка',
                    'kids'              => 'Діти',
                    'adult'             => 'Дорослий',
                    'child'             => 'Дитина',
                    'age-group'         => 'Вікова група',
                    'available-for'     => 'Товар доступний для',
                    'product-condition' => 'Стан товару',
                    'tax-apply-on-ship' => 'Податок застосовується при відправленні',
                    'tax-apply-as'      => 'Застосування податку при покупці',
                    'tax-rate'          => 'Податкова ставка',
                    'target-country'    => 'Цільова країна',
                ],
            ],
        ],

        'layouts' => [
            'google-feed' => 'Google Shopping Feed',
            'category'    => 'Відображення категорії',
            'product'     => 'Продукти',
            'attribute'   => 'Відображення атрибуту',

            'settings' => [
                'title'                 => 'Google Shopping Feed',
                'auth'                  => 'Автентифікація облікового запису',
                'auth-btn'              => 'Автентифікація',
                'auth-refresh-btn'      => 'Оновити токен',
                'api-key'               => 'Ключ Oauth API',
                'google-api-secret-key' => 'Секретний ключ Google Oauth',
                'api-secret-key'        => 'Секретний ключ Oauth API',
                'auth-success'          => 'Успішно автентифіковано',
                'refreshed-token'       => 'Токен доступу успішно оновлено',
            ],
        ],

        'attribute' => [
            'title' => 'Map Google Product Attribute',
            
            'index' => [
                'product-id'      => 'ID продукту',
                'title-id'        => 'Назва',
                'description-id'  => 'Опис',
                'gtin-id'         => 'GTIN',
                'brand-id'        => 'Бренд',
                'color-id'        => 'Колір',
                'weight-id'       => 'Вага для відправлення',
                'image-id'        => 'Посилання на зображення',
                'size-id'         => 'Розмір',
                'size-system-id'  => 'Система розмірів',
                'size-type-id'    => 'Тип розміру',
                'mpn-id'          => 'MPN',
                'save-btn-title'  => 'ЗБЕРЕГТИ',
                'reset-btn-title' => 'Оновити',
            ],

            'save-success'   => 'Атрибути успішно збережені',
            'update-success' => 'Атрибути успішно оновлені',
            'delete-success' => 'Оновлення успішно виконано',
            'delete-failed'  => 'Помилка! Видалення не вдалося.',
        ],

        'map-categories' => [
            'success-save'   => 'Категорія успішно відображена',
            'success-delete' => 'Відображена категорія успішно видалена',
            'index' => [
                'title'         => 'Відображення категорій Google',
                'map-btn-title' => 'Відобразити нову категорію',

                'datagrid' => [
                    'id'          => 'Id',
                    'delete'      => 'Видалити',
                    'store-name'  => 'Назва категорії магазину',
                    'google-name' => 'Назва категорії Google',
                ],
            ],

            'create' => [
                'add-title'                     => 'Відобразити нову категорію',
                'refresh'                       => 'Оновити',
                'save'                          => 'Зберегти',
                'select-category'               => 'Вибрати категорію',
                'entry-choose-bagisto-category' => 'Виберіть категорію магазину',
                'entry-select-bagisto-category' => 'Виберіть категорію магазину',
                'entry-choose-origin-category'  => 'Виберіть категорію Google',
            ],
        ],

        'product' => [
            'index'  => [
                'title'     => 'Експортовані продукти',
                'add-title' => 'Додати сторінку CMS',
            ],

            'export' => [
                'title'       => 'Експорт до Google Shop',
                'please-wait' => 'Будь ласка, зачекайте. Продукт завантажується.',
            ],

            'refresh'              => 'Термін дії вашого токена доступу минув. Будь ласка, оновіть свій токен.',
            'something-went-wrong' => 'Щось пішло не так. Будь ласка, спробуйте ще раз.',
            'map-attribute-failed' => 'Будь ласка, сопоставте атрибути і спробуйте ще раз.',
            'export-success'       => 'Продукти успішно експортовані.',
        ],

        'store' => [
            'select-store-category'  => 'Будь ласка, виберіть категорію магазину',
            'select-google-category' => 'Будь ласка, виберіть категорію Google',
        ],
    ],

    'acl' => [
        'google-feed' => 'Google Shopping Feed',
        'category'    => 'Категорія на карті',
        'product'     => 'Продукти',
        'attribute'   => 'Атрибут на карті',
        'refresh'     => 'Оновити',
        'destroy'     => 'Знищити',
        'export'      => 'Експорт',
        'create'      => 'Створити',
        'auth'        => 'Аутентифікація',
    ],
];