<?php

return [
    'admin' => [
        'configuration' => [
            'settings' => [
                'title' => 'הזנת קניות של גוגל',
                'info'  => 'הזנת קניות של גוגל',

                'general' => [
                    'title'                 => 'כללי',
                    'info'                  => 'הגדר סטטוס מודול, שם אפליקציה של Google, מפתחות OAuth של Google ומזהה סוחר.',
                    'enable-module'         => 'הפעל מודול',
                    'application-name'      => 'הגדר שם יישום Google',
                    'google-api-key'        => 'מפתח Oauth של גוגל',
                    'google-api-secret-key' => 'מפתח סודי של Oauth של גוגל',
                    'google-merchant-id'    => 'מזהה סוחר של חנות גוגל',
                ],

                'default' => [
                    'title'             => 'תצורת ברירת מחדל',
                    'info'              => 'הגדר קטגוריה ברירת מחדל, יחידת משקל, קבוצת גיל, זמינות המוצר, תנאים ומדינה יעד.',
                    'category'          => 'קטגוריה דיפולטיבית',
                    'category-info'     => 'השתמש בטקסונומיה של גוגל כגון בגדים ואביזרים לינק https://support.google.com/merchants/answer/6324436?hl=en',
                    'weight-unit'       => 'יחידת משקל',
                    'new'               => 'חדש',
                    'old'               => 'ישן',
                    'male'              => 'זכר',
                    'female'            => 'נקבה',
                    'kids'              => 'ילדים',
                    'adult'             => 'מבוגר',
                    'child'             => 'ילד',
                    'age-group'         => 'קבוצת גיל',
                    'available-for'     => 'מוצר זמין עבור',
                    'product-condition' => 'מצב המוצר',
                    'tax-apply-on-ship' => 'מס יחול על משלוח',
                    'tax-apply-as'      => 'מס יחול כמו',
                    'tax-rate'          => 'שיעור המס',
                    'target-country'    => 'מדינת יעד',
                ],
            ],
        ],

        'layouts' => [
            'google-feed' => 'הזנת קניות של גוגל',
            'category'    => 'מפת קטגוריה',
            'product'     => 'מוצרים',
            'attribute'   => 'מפת תכונה',

            'settings' => [
                'title'                 => 'הזנת קניות של גוגל',
                'auth'                  => 'אמת חשבון',
                'auth-btn'              => 'אמת',
                'auth-refresh-btn'      => 'רענן אסימון',
                'api-key'               => 'מפתח API של Oauth',
                'google-api-secret-key' => 'מפתח סודי של Oauth של גוגל',
                'api-secret-key'        => 'מפתח סודי של API של Oauth',
                'auth-success'          => 'אומת בהצלחה',
                'refreshed-token'       => 'אסימון רענון בהצלחה',
            ],
        ],

        'attribute' => [
            'title' => 'מפת תכונות מוצר של גוגל',
            
            'index' => [
                'product-id'      => 'מזהה מוצר',
                'title-id'        => 'כותרת',
                'description-id'  => 'תיאור',
                'gtin-id'         => 'GTIN',
                'brand-id'        => 'מותג',
                'color-id'        => 'צבע',
                'weight-id'       => 'משקל משלוח',
                'image-id'        => 'קישור תמונה',
                'size-id'         => 'גודל',
                'size-system-id'  => 'מערכת גודל',
                'size-type-id'    => 'סוג גודל',
                'mpn-id'          => 'MPN',
                'save-btn-title'  => 'שמור',
                'reset-btn-title' => 'רענן',
            ],

            'save-success'   => 'תכונות ממופות נשמרו בהצלחה',
            'update-success' => 'תכונות ממופות עודכנו בהצלחה',
            'delete-success' => 'רוענן בהצלחה',
            'delete-failed'  => 'שגיאה! מחיקה נכשלה.',
        ],

        'map-categories' => [
            'success-save'   => 'קטגוריה ממופה נשמרה בהצלחה',
            'success-delete' => 'קטגוריה ממופה נמחקה בהצלחה',
            
            'index' => [
                'title'         => 'מפת קטגוריות של גוגל',
                'map-btn-title' => 'מפת קטגוריה חדשה',

                'datagrid' => [
                    'id'          => 'מזהה',
                    'delete'      => 'מחק',
                    'store-name'  => 'שם קטגוריה של החנות',
                    'google-name' => 'שם קטגוריה של גוגל',
                ],
            ],

            'create' => [
                'add-title'                     => 'מפת קטגוריה חדשה',
                'refresh'                       => 'רענן',
                'save'                          => 'שמור',
                'select-category'               => 'בחר קטגוריה',
                'entry-choose-bagisto-category' => 'בחר קטגוריה של החנות',
                'entry-select-bagisto-category' => 'בחר קטגוריה של החנות',
                'entry-choose-origin-category'  => 'בחר קטגוריה של גוגל',
            ],
        ],

        'product' => [
            'index'  => [
                'title'     => 'מוצרים שיוצאו',
                'add-title' => 'הוסף עמוד CMS',
            ],

            'export' => [
                'title'       => 'ייצוא לחנות Google',
                'please-wait' => 'אנא המתן. המוצר נטען.',
            ],

            'refresh'              => 'תוקף טוקן הגישה שלך פג תוקף. נא רענן את הטוקן שלך.',
            'something-went-wrong' => 'משהו השתבש. נסה שוב בבקשה.',
            'map-attribute-failed' => 'אנא מפה את המאפיינים ונסה שוב.',
            'export-success'       => 'המוצרים יוצאים בהצלחה.',

        ],

        'store' => [
            'select-store-category'  => 'בחר קטגוריית חנות',
            'select-google-category' => 'בחר קטגוריית גוגל',
        ],
    ],

    'acl' => [
        'google-feed' => 'מקור Google Shopping',
        'category'    => 'מפה קטגוריה',
        'product'     => 'מוצרים',
        'attribute'   => 'מפה מאפיין',
        'refresh'     => 'רענן',
        'destroy'     => 'השמד',
        'export'      => 'ייצא',
        'create'      => 'צור',
        'auth'        => 'אימות',
    ],
];