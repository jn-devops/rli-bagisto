<?php

return [
    'admin' => [
        'configuration' => [
            'settings' => [
                'title' => 'Google Shopping Feed',
                'info'  => 'Google Shopping Feed',

                'general' => [
                    'title'                 => 'Algemeen',
                    'info'                  => 'Stel modulestatus, Google-toepassingsnaam, Google OAuth-sleutels en handelaars-ID in.',
                    'enable-module'         => 'Module inschakelen',
                    'application-name'      => 'Google-toepassingsnaam instellen',
                    'google-api-key'        => 'Google Oauth-sleutel',
                    'google-api-secret-key' => 'Google Oauth geheime sleutel',
                    'google-merchant-id'    => 'Google Shop Merchant ID',
                ],

                'default' => [
                    'title'             => 'Standaardconfiguratie',
                    'info'              => 'Stel standaardcategorie, gewichtseenheid, leeftijdsgroep, productbeschikbaarheid, voorwaarden en doelland in.',
                    'category'          => 'Standaardcategorie',
                    'category-info'     => 'Gebruik de google-taxonomie, bijv. Kleding & Accessoires link https://support.google.com/merchants/answer/6324436?hl=nl',
                    'weight-unit'       => 'Gewichtseenheid',
                    'new'               => 'Nieuw',
                    'old'               => 'Oud',
                    'male'              => 'Mannelijk',
                    'female'            => 'Vrouwelijk',
                    'kids'              => 'Kinderen',
                    'adult'             => 'Volwassene',
                    'child'             => 'Kind',
                    'age-group'         => 'Leeftijdsgroep',
                    'available-for'     => 'Product beschikbaar voor',
                    'product-condition' => 'Productconditie',
                    'tax-apply-on-ship' => 'Belasting toepassen op verzending',
                    'tax-apply-as'      => 'Belasting toepassen als',
                    'tax-rate'          => 'Belastingtarief',
                    'target-country'    => 'Doelland',
                ],
            ],
        ],

        'layouts' => [
            'google-feed' => 'Google Shopping Feed',
            'category'    => 'Categorie toewijzen',
            'product'     => 'Producten',
            'attribute'   => 'Attribuut toewijzen',

            'settings'   => [
                'title'                 => 'Google Shopping Feed',
                'auth'                  => 'Account verifiëren',
                'auth-btn'              => 'Verifiëren',
                'auth-refresh-btn'      => 'Token vernieuwen',
                'api-key'               => 'Oauth API-sleutel',
                'google-api-secret-key' => 'Google Oauth geheime sleutel',
                'api-secret-key'        => 'Oauth API geheime sleutel',
                'auth-success'          => 'Succesvol geverifieerd',
                'refreshed-token'       => 'Toegangstoken is succesvol vernieuwd',
            ],
        ],

        'attribute' => [
            'title' => 'Google Productattribuut toewijzen',
            
            'index' => [
                'product-id'      => 'Product-ID',
                'title-id'        => 'Titel',
                'description-id'  => 'Beschrijving',
                'gtin-id'         => 'GTIN',
                'brand-id'        => 'Merk',
                'color-id'        => 'Kleur',
                'weight-id'       => 'Verzendgewicht',
                'image-id'        => 'Afbeeldingslink',
                'size-id'         => 'Maat',
                'size-system-id'  => 'Maatsysteem',
                'size-type-id'    => 'Maattype',
                'mpn-id'          => 'MPN',
                'save-btn-title'  => 'OPSLAAN',
                'reset-btn-title' => 'Vernieuwen',
            ],

            'save-success'   => 'Toegewezen attributen succesvol opgeslagen',
            'update-success' => 'Toegewezen attributen succesvol bijgewerkt',
            'delete-success' => 'Succesvol vernieuwd',
            'delete-failed'  => 'Fout! Verwijderen mislukt.',
        ],

        'map-categories' => [
            'success-save'   => 'Categorie succesvol toegewezen',
            'success-delete' => 'Toegewezen categorie is succesvol verwijderd',

            'index' => [
                'title'         => 'Google-categorieën toewijzen',
                'map-btn-title' => 'Nieuwe categorie toewijzen',

                'datagrid' => [
                    'id'          => 'Id',
                    'delete'      => 'Verwijderen',
                    'store-name'  => 'Winkelcategorie Naam',
                    'google-name' => 'Google Categorie Naam',
                ],
            ],

            'create' => [
                'add-title'                     => 'Nieuwe Categorie Toewijzen',
                'refresh'                       => 'Vernieuwen',
                'save'                          => 'Opslaan',
                'select-category'               => 'Selecteer Categorie',
                'entry-choose-bagisto-category' => 'Kies Winkelcategorie',
                'entry-select-bagisto-category' => 'Selecteer winkelcategorie',
                'entry-choose-origin-category'  => 'Kies Google Categorie',
            ],
        ],

        'product' => [
            'index'  => [
                'title'     => 'Geëxporteerde Producten',
                'add-title' => 'Voeg CMS Pagina Toe',
            ],

            'export' => [
                'title'       => 'Exporteren naar Google Shop',
                'please-wait' => 'Even geduld aub. Product wordt geüpload.',
            ],

            'refresh'              => 'Uw toegangstoken is verlopen. Vernieuw uw token alstublieft.',
            'something-went-wrong' => 'Er is iets misgegaan. Probeer het opnieuw.',
            'map-attribute-failed' => 'Gelieve de attributen te mappen en opnieuw te proberen.',
            'export-success'       => 'Producten succesvol geëxporteerd.',
        ],

        'store' => [
            'select-store-category'  => 'Selecteer alstublieft een winkelcategorie',
            'select-google-category' => 'Selecteer alstublieft een Google categorie',
        ],
    ],

   'acl' => [
        'google-feed' => 'Google Shopping-feed',
        'category'    => 'Categorie toewijzen',
        'product'     => 'Producten',
        'attribute'   => 'Eigenschap toewijzen',
        'refresh'     => 'Vernieuwen',
        'destroy'     => 'Verwijderen',
        'export'      => 'Exporteren',
        'create'      => 'Aanmaken',
        'auth'        => 'Authenticeren',
    ],
];