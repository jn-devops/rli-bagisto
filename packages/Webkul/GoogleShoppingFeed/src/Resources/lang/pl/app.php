<?php

return [
    'admin' => [
        'configuration' => [
           'settings' => [
                'title' => 'Kanał zakupów Google',
                'info'  => 'Kanał zakupów Google',

                'general' => [
                    'title'                 => 'Ogólne',
                    'info'                  => 'Ustaw status modułu, nazwę aplikacji Google, klucze OAuth Google oraz identyfikator handlowca.',
                    'enable-module'         => 'Włącz moduł',
                    'application-name'      => 'Ustaw nazwę aplikacji Google',
                    'google-api-key'        => 'Klucz Google Oauth',
                    'google-api-secret-key' => 'Sekretny klucz Google Oauth',
                    'google-merchant-id'    => 'ID sprzedawcy Google Shop',
                ],

                'default' => [
                    'title'             => 'Domyślna konfiguracja',
                    'info'              => 'Ustaw domyślną kategorię, jednostkę wagi, grupę wiekową, dostępność produktu, warunki i kraj docelowy.',
                    'category'          => 'Domyślna kategoria',
                    'category-info'     => 'Użyj taksonomii Google, np. Odzież i akcesoria link https://support.google.com/merchants/answer/6324436?hl=pl',
                    'weight-unit'       => 'Jednostka wagi',
                    'new'               => 'Nowy',
                    'old'               => 'Stary',
                    'male'              => 'Męski',
                    'female'            => 'Żeński',
                    'kids'              => 'Dzieci',
                    'adult'             => 'Dorosły',
                    'child'             => 'Dziecko',
                    'age-group'         => 'Grupa wiekowa',
                    'available-for'     => 'Produkt dostępny dla',
                    'product-condition' => 'Stan produktu',
                    'tax-apply-on-ship' => 'Podatek stosowany przy wysyłce',
                    'tax-apply-as'      => 'Podatek zakupowy stosowany jako',
                    'tax-rate'          => 'Stawka podatkowa',
                    'target-country'    => 'Kraj docelowy',
                ],
            ],
        ],

        'layouts' => [
            'google-feed' => 'Kanał zakupów Google',
            'category'    => 'Mapuj kategorię',
            'product'     => 'Produkty',
            'attribute'   => 'Mapuj atrybut',

            'settings' => [
                'title'                 => 'Kanał zakupów Google',
                'auth'                  => 'Uwierzytelnij konto',
                'auth-btn'              => 'Uwierzytelnij',
                'auth-refresh-btn'      => 'Odśwież token',
                'api-key'               => 'Klucz API Oauth',
                'google-api-secret-key' => 'Sekretny klucz Google Oauth',
                'api-secret-key'        => 'Sekretny klucz API Oauth',
                'auth-success'          => 'Authenticated successfully',
                'refreshed-token'       => 'Access token has been refresh successfully',
            ],
        ], 

        'attribute' => [
            'title' => 'Mapuj atrybuty produktów Google',
            
            'index' => [
                'product-id'      => 'ID Produktu',
                'title-id'        => 'Tytuł',
                'description-id'  => 'Opis',
                'gtin-id'         => 'GTIN',
                'brand-id'        => 'Marka',
                'color-id'        => 'Kolor',
                'weight-id'       => 'Waga wysyłki',
                'image-id'        => 'Link do obrazu',
                'size-id'         => 'Rozmiar',
                'size-system-id'  => 'System rozmiarów',
                'auth-success'    => 'Uwierzytelniono pomyślnie',
                'refreshed-token' => 'Token dostępu został pomyślnie odświeżony',
                'save-btn-title'  => 'ZAPISZ',
                'reset-btn-title' => 'Odśwież',
            ],

            'save-success'   => 'Przypisane atrybuty zostały pomyślnie zapisane',
            'update-success' => 'Przypisane atrybuty zostały pomyślnie zaktualizowane',
            'delete-success' => 'Pomyślnie odświeżono',
            'delete-failed'  => 'Błąd! Usunięcie nie powiodło się.',
        ],
        
        'map-categories' => [
            'success-save'   => 'Kategoria została przypisana pomyślnie',
            'success-delete' => 'Przypisana kategoria została pomyślnie usunięta',

            'index' => [
                'title'         => 'Przypisz kategorie Google',
                'map-btn-title' => 'Przypisz nową kategorię',

                'datagrid' => [
                    'id'          => 'Id',
                    'delete'      => 'Usuń',
                    'store-name'  => 'Nazwa kategorii sklepu',
                    'google-name' => 'Nazwa kategorii Google',
                ],
            ],

            'create' => [
                'add-title'                     => 'Przypisz nową kategorię',
                'refresh'                       => 'Odśwież',
                'save'                          => 'Zapisz',
                'select-category'               => 'Wybierz kategorię',
                'entry-choose-bagisto-category' => 'Wybierz kategorię sklepu',
                'entry-select-bagisto-category' => 'Wybierz kategorię sklepu',
                'entry-choose-origin-category'  => 'Wybierz kategorię Google',
            ],
        ],

        'product' => [
            'index'  => [
                'title'     => 'Wyeksportowane Produkty',
                'add-title' => 'Dodaj stronę CMS',
            ],

            'export' => [
                'title'       => 'Eksportuj do Google Shop',
                'please-wait' => 'Proszę czekać. Produkt jest przesyłany.',
            ],

            'refresh'              => 'Twój token dostępu wygasł. Proszę odświeżyć swój token.',
            'something-went-wrong' => 'Coś poszło nie tak. Proszę spróbować ponownie.',
            'map-attribute-failed' => 'Proszę przemapować atrybuty i spróbować ponownie.',
            'export-success'       => 'Produkty zostały pomyślnie wyeksportowane.',
        ],

        'store' => [
            'select-store-category'  => 'Proszę wybrać kategorię sklepu',
            'select-google-category' => 'Proszę wybrać kategorię Google',
        ],
    ],

    'acl' => [
        'google-feed' => 'Dane Google Shopping',
        'category'    => 'Mapa kategorii',
        'product'     => 'Produkty',
        'attribute'   => 'Mapa atrybutów',
        'refresh'     => 'Odśwież',
        'destroy'     => 'Zniszcz',
        'export'      => 'Eksportuj',
        'create'      => 'Utwórz',
        'auth'        => 'Uwierzytelnij',
    ],
];