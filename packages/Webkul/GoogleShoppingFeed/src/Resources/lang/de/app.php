<?php

return [
    'admin' => [
        'configuration' => [
            'settings' => [
                'title' => 'Google Shopping-Feed',
                'info'  => 'Google Shopping-Feed',

                'general' => [
                    'title'                 => 'Allgemein',
                    'info'                  => 'Setzen Sie den Modulstatus, den Google-Anwendungsnamen, die Google OAuth-Schlüssel und die Händler-ID.',
                    'enable-module'         => 'Modul aktivieren',
                    'application-name'      => 'Google-Anwendungsname festlegen',
                    'google-api-key'        => 'Google Oauth Schlüssel',
                    'google-api-secret-key' => 'Google Oauth Geheimschlüssel',
                    'google-merchant-id'    => 'Google Shop Händler-ID',
                ],

                'default' => [
                    'title'             => 'Standardkonfiguration',
                    'info'              => 'Setzen Sie die Standardkategorie, Gewichtseinheit, Altersgruppe, Produktverfügbarkeit, Bedingungen und Zielland.',
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
                    'tax-apply-as'      => 'Einkaufssteuer anwenden als',
                    'tax-rate'          => 'Steuersatz',
                    'target-country'    => 'Zielland',
                ],
            ],
        ],
        
        'layouts' => [
            'google-feed' => 'Google Shopping-Feed',
            'category'    => 'Kategorie zuordnen',
            'product'     => 'Produkte',
            'attribute'   => 'Attribut zuordnen',

            'settings' => [
                'title'                 => 'Google Shopping-Feed',
                'auth'                  => 'Konto authentifizieren',
                'auth-btn'              => 'Authentifizieren',
                'auth-refresh-btn'      => 'Token aktualisieren',
                'api-key'               => 'Oauth API-Schlüssel',
                'google-api-secret-key' => 'Google Oauth Geheimschlüssel',
                'api-secret-key'        => 'Oauth API-Geheimschlüssel',
                'auth-success'          => 'Erfolgreich authentifiziert',
                'refreshed-token'       => 'Zugriffstoken erfolgreich aktualisiert',
            ],
        ],

        'attribute' => [
            'title' => 'Google Produktattribute zuordnen',
            
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
                'size-type-id'    => 'Größenart',
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
            'success-save'   => 'Kategorie erfolgreich zugeordnet',
            'success-delete' => 'Zugeordnete Kategorie erfolgreich gelöscht',

            'index' => [
                'title'         => 'Google Kategorien zuordnen',
                'map-btn-title' => 'Neue Kategorie zuordnen',

                'datagrid' => [
                    'id'          => 'Id',
                    'delete'      => 'Löschen',
                    'store-name'  => 'Name der Shop-Kategorie',
                    'google-name' => 'Name der Google-Kategorie',
                ],
            ],

            'create' => [
                'add-title'                     => 'Neue Kategorie zuordnen',
                'refresh'                       => 'Aktualisieren',
                'save'                          => 'Speichern',
                'select-category'               => 'Kategorie auswählen',
                'entry-choose-bagisto-category' => 'Shop-Kategorie auswählen',
                'entry-select-bagisto-category' => 'Shop-Kategorie auswählen',
                'entry-choose-origin-category'  => 'Google-Kategorie auswählen',
            ],
        ],
        
        'product' => [
            'index'  => [
                'title'     => 'Exportieren zu Google Shop',
                'add-title' => 'CMS-Seite hinzufügen',
            ],

            'export' => [
                'title'       => 'Produkt exportieren',
                'please-wait' => 'Bitte warten. Das Produkt wird hochgeladen.',
            ],

            'refresh'              => 'Ihr Zugriffstoken ist abgelaufen. Bitte erneuern Sie Ihr Token.',
            'something-went-wrong' => 'Es ist ein Fehler aufgetreten. Bitte versuchen Sie es erneut.',
            'map-attribute-failed' => 'Bitte ordnen Sie die Attribute zu und versuchen Sie es erneut.',
            'export-success'       => 'Produkte erfolgreich exportiert.',
        ],

        'store' => [
            'select-store-category'  => 'Bitte wählen Sie eine Shop-Kategorie aus',
            'select-google-category' => 'Bitte wählen Sie eine Google-Kategorie aus',
        ],
    ],

    'acl' => [
        'google-feed' => 'Google Shopping-Feed',
        'category'    => 'Kategorie zuordnen',
        'product'     => 'Produkte',
        'attribute'   => 'Attribut zuordnen',
        'refresh'     => 'Aktualisieren',
        'destroy'     => 'Zerstören',
        'export'      => 'Exportieren',
        'create'      => 'Erstellen',
        'auth'        => 'Authentifizieren',
    ],
];