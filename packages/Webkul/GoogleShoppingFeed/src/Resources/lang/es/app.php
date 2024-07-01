<?php

return [
    'admin' => [
        'configuration' => [
            'settings' => [
                'title' => 'Google Shopping Feed',
                'info'  => 'Google Shopping Feed',

                'general' => [
                    'title'                 => 'Allgemein',
                    'info'                  => 'Establecer estado del módulo, nombre de la aplicación de Google, claves de OAuth de Google e ID del comerciante.',
                    'enable-module'         => 'Modul aktivieren',
                    'application-name'      => 'Establecer nombre de la aplicación de Google',
                    'google-api-key'        => 'Google Oauth Schlüssel',
                    'google-api-secret-key' => 'Google Oauth Geheimschlüssel',
                    'google-merchant-id'    => 'Google Shop Händler-ID',
                ],

                'default' => [
                    'title'             => 'Standardkonfiguration',
                    'info'              => 'Establecer categoría por defecto, unidad de peso, grupo de edad, disponibilidad del producto, condiciones y país objetivo.',
                    'category'          => 'Standardkategorie',
                    'category-info'     => 'Verwenden Sie die Google-Taxonomie, z.B. Bekleidung & Accessoires Link https://support.google.com/merchants/answer/6324436?hl=de',
                    'weight-unit'       => 'Gewichtseinheit',
                    'new'               => 'Neu',
                    'old'               => 'Alt',
                    'male'              => 'Männlich',
                    'female'            => 'Weiblich',
                    'kids'              => 'Kinder',
                    'adult'             => 'Erwachsener',
                    'child'             => 'Kind',
                    'age-group'         => 'Altersgruppe',
                    'available-for'     => 'Produkt verfügbar für',
                    'product-condition' => 'Produktzustand',
                    'tax-apply-on-ship' => 'Steuer auf Versand anwenden',
                    'tax-apply-as'      => 'Einkaufssteuer als',
                    'tax-rate'          => 'Steuersatz',
                    'target-country'    => 'Zielland',
                ],
            ],
        ],

        'layouts' => [
            'google-feed' => 'Google Shopping Feed',
            'category'    => 'Kategorie zuordnen',
            'product'     => 'Produkte',
            'attribute'   => 'Attribut zuordnen',

            'settings' => [
                'title'                 => 'Google Shopping Feed',
                'auth'                  => 'Konto authentifizieren',
                'auth-btn'              => 'Authentifizieren',
                'auth-refresh-btn'      => 'Token aktualisieren',
                'api-key'               => 'Oauth API-Schlüssel',
                'google-api-secret-key' => 'Google Oauth Geheimschlüssel',
                'api-secret-key'        => 'Oauth API Geheimschlüssel',
                'auth-success'          => 'Erfolgreich authentifiziert',
                'refreshed-token'       => 'Zugriffstoken wurde erfolgreich aktualisiert',
            ],
        ],

        'attribute' => [
            'title' => 'Google-Produktattribut zuordnen',
            
            'index' => [
                'product-id'      => 'Produkt-ID',
                'title-id'        => 'Titel',
                'description-id'  => 'Beschreibung',
                'gtin-id'         => 'GTIN',
                'brand-id'        => 'Marke',
                'color-id'        => 'Farbe',
                'weight-id'       => 'Versandgewicht',
                'image-id'        => 'Bildlink',
                'size-id'         => 'Größe',
                'size-system-id'  => 'Größensystem',
                'size-type-id'    => 'Größentyp',
                'mpn-id'          => 'MPN',
                'save-btn-title'  => 'SPEICHERN',
                'reset-btn-title' => 'Aktualisieren',
            ],

            'save-success'   => 'Zugeordnete Attribute erfolgreich gespeichert',
            'update-success' => 'Zugeordnete Attribute erfolgreich aktualisiert',
            'delete-success' => 'Erfolgreich aktualisiert',
            'delete-failed'  => 'Fehler! Löschung fehlgeschlagen.',
        ],

        'map-categories' => [
            'success-save'   => 'Categoría mapeada con éxito',
            'success-delete' => 'La categoría mapeada ha sido eliminada con éxito',

            'index' => [
                'title'         => 'Mapear Categorías de Google',
                'map-btn-title' => 'Mapear nueva Categoría',

                'datagrid' => [
                    'id'          => 'Id',
                    'delete'      => 'Eliminar',
                    'store-name'  => 'Nombre de Categoría de la Tienda',
                    'google-name' => 'Nombre de Categoría de Google',
                ],
            ],

            'create' => [
                'add-title'                     => 'Mapear Nueva Categoría',
                'refresh'                       => 'Refrescar',
                'save'                          => 'Guardar',
                'select-category'               => 'Seleccionar Categoría',
                'entry-choose-bagisto-category' => 'Elegir Categoría de la Tienda',
                'entry-select-bagisto-category' => 'Seleccionar categoría de la tienda',
                'entry-choose-origin-category'  => 'Elegir Categoría de Google',
            ],
        ],

        'product' => [
            'index'  => [
                'title'     => 'Exportar a Google Shop',
                'add-title' => 'Agregar Página CMS',
            ],

            'export' => [
                'title'       => 'Exportar Producto',
                'please-wait' => 'Por favor espere. El producto se está subiendo.',
            ],

            'refresh'              => 'Su token de acceso ha caducado. Por favor, actualice su token.',
            'something-went-wrong' => 'Ha ocurrido un error. Por favor, inténtelo de nuevo.',
            'map-attribute-failed' => 'Por favor, mapee los atributos e inténtelo de nuevo.',
            'export-success'       => 'Productos exportados exitosamente.',
        ],

        'store' => [
            'select-store-category'  => 'Por favor selecciona una categoría de la tienda',
            'select-google-category' => 'Por favor selecciona una categoría de Google',
        ],
    ],

    'acl' => [
        'google-feed' => 'Feed de Google Shopping',
        'category'    => 'Mapear Categoría',
        'product'     => 'Productos',
        'attribute'   => 'Mapear Atributo',
        'refresh'     => 'Actualizar',
        'destroy'     => 'Destruir',
        'export'      => 'Exportar',
        'create'      => 'Crear',
        'auth'        => 'Autenticar',
    ],
];