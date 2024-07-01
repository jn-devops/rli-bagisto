<?php

return [
    'admin' => [
        'configuration' => [
            'settings' => [
                'title' => 'Feed di Shopping Google',
                'info'  => 'Feed di Shopping Google',

                'general' => [
                    'title'                 => 'Generale',
                    'info'                  => "mposta lo stato del modulo, il nome dell'applicazione Google, le chiavi OAuth di Google e l'ID del commerciante.",
                    'enable-module'         => 'Abilita Modulo',
                    'application-name'      => 'Imposta il nome dell\'applicazione Google',
                    'google-api-key'        => 'Chiave Oauth Google',
                    'google-api-secret-key' => 'Chiave Segreta Oauth Google',
                    'google-merchant-id'    => 'ID Commerciante Google Shop',
                ],

                'default' => [
                    'title'             => 'Configurazione Predefinita',
                    'info'              => "Imposta la categoria predefinita, l'unità di peso, il gruppo di età, la disponibilità del prodotto, le condizioni e il paese di destinazione.",
                    'category'          => 'Categoria Predefinita',
                    'category-info'     => 'Utilizza la tassonomia di google, ad esempio Abbigliamento e Accessori link https://support.google.com/merchants/answer/6324436?hl=it',
                    'weight-unit'       => 'Unità di Peso',
                    'new'               => 'Nuovo',
                    'old'               => 'Vecchio',
                    'male'              => 'Maschio',
                    'female'            => 'Femmina',
                    'kids'              => 'Bambini',
                    'adult'             => 'Adulto',
                    'child'             => 'Bambino',
                    'age-group'         => "Fascia d'età",
                    'available-for'     => 'Prodotto Disponibile Per',
                    'product-condition' => 'Condizione del Prodotto',
                    'tax-apply-on-ship' => 'Applica Tasse sulla Spedizione',
                    'tax-apply-as'      => 'Applica Tasse di Shopping Come',
                    'tax-rate'          => 'Aliquota Fiscale',
                    'target-country'    => 'Paese di Destinazione',
                ],
            ],
        ],

        'layouts' => [
            'google-feed' => 'Feed di Shopping Google',
            'category'    => 'Mappa Categoria',
            'product'     => 'Prodotti',
            'attribute'   => 'Mappa Attributo',

            'settings' => [
                'title'                 => 'Feed di Shopping Google',
                'auth'                  => 'Autentica Account',
                'auth-btn'              => 'Autentica',
                'auth-refresh-btn'      => 'Aggiorna Token',
                'api-key'               => 'Chiave API Oauth',
                'google-api-secret-key' => 'Chiave Segreta Oauth Google',
                'api-secret-key'        => 'Chiave Segreta API Oauth',
                'auth-success'          => 'Autenticato con successo',
                'refreshed-token'       => 'Token di accesso aggiornato con successo',
            ],
        ],

        'attribute' => [
            'title' => 'Mappa Attributo Prodotto Google',
            
            'index' => [
                'product-id'      => 'ID Prodotto',
                'title-id'        => 'Titolo',
                'description-id'  => 'Descrizione',
                'gtin-id'         => 'GTIN',
                'brand-id'        => 'Marca',
                'color-id'        => 'Colore',
                'weight-id'       => 'Peso di Spedizione',
                'image-id'        => 'Link Immagine',
                'size-id'         => 'Taglia',
                'size-system-id'  => 'Sistema di Taglie',
                'size-type-id'    => 'Tipo di Taglia',
                'mpn-id'          => 'MPN',
                'save-btn-title'  => 'SALVA',
                'reset-btn-title' => 'Aggiorna',
            ],

            'save-success'   => 'Attributi mappati salvati con successo',
            'update-success' => 'Attributi mappati aggiornati con successo',
            'delete-success' => 'Aggiornato con successo',
            'delete-failed'  => 'Errore! Eliminazione fallita.',
        ],

        'map-categories' => [
            'success-save'   => 'Categoria mappata con successo',
            'success-delete' => 'La categoria mappata è stata eliminata con successo',

            'index' => [
                'title'         => 'Mappa Categorie Google',
                'map-btn-title' => 'Mappa nuova Categoria',

                'datagrid' => [
                    'id'          => 'Id',
                    'delete'      => 'Elimina',
                    'store-name'  => 'Nome Categoria Negozio',
                    'google-name' => 'Nome Categoria Google',
                ],
            ],

            'create' => [
                'add-title'                     => 'Mappa Nuova Categoria',
                'refresh'                       => 'Aggiorna',
                'save'                          => 'Salva',
                'select-category'               => 'Seleziona Categoria',
                'entry-choose-bagisto-category' => 'Scegli Categoria Negozio',
                'entry-select-bagisto-category' => 'Seleziona categoria negozio',
                'entry-choose-origin-category'  => 'Scegli Categoria Google',
            ],
        ],

        'product' => [
            'index'  => [
                'title'     => 'Prodotti Esportati',
                'add-title' => 'Aggiungi Pagina CMS',
            ],

            'export' => [
                'title'       => 'Esporta su Google Shop',
                'please-wait' => 'Attendere prego. Il prodotto è in caricamento.',
            ],

            'refresh'              => 'Il token di accesso è scaduto. Si prega di aggiornare il token.',
            'something-went-wrong' => 'Qualcosa è andato storto. Si prega di riprovare.',
            'map-attribute-failed' => 'Si prega di mappare gli attributi e riprovare.',
            'export-success'       => 'Prodotti esportati con successo.',
        ],

        'store' => [
            'select-store-category'  => 'Si prega di selezionare la categoria del negozio',
            'select-google-category' => 'Si prega di selezionare la categoria di Google',
        ],
    ],

    'acl' => [
        'google-feed' => 'Feed Google Shopping',
        'category'    => 'Mappa Categoria',
        'product'     => 'Prodotti',
        'attribute'   => 'Mappa Attributo',
        'refresh'     => 'Aggiorna',
        'destroy'     => 'Distruggi',
        'export'      => 'Esporta',
        'create'      => 'Crea',
        'auth'        => 'Autentica',
    ],
];