<?php

return [
    'admin' => [
        'configuration' => [
            'settings' => [
                'title' => 'Flux de Shopping Google',
                'info'  => 'Flux de Shopping Google',
                
                'general' => [
                    'title'                 => 'Général',
                    'info'                  => "Définir l'état du module, le nom de l'application Google, les clés OAuth de Google et l'identifiant du marchand.",
                    'enable-module'         => 'Activer le Module',
                    'application-name'      => 'Définir le nom de l\'application Google',
                    'google-api-key'        => 'Clé d\'authentification Google',
                    'google-api-secret-key' => 'Clé secrète d\'authentification Google',
                    'google-merchant-id'    => 'ID de marchand Google Shop',
                ],

                'default' => [
                    'title'             => 'Configuration par défaut',
                    'info'              => "Définir la catégorie par défaut, l'unité de poids, le groupe d'âge, la disponibilité du produit, les conditions et le pays cible.",
                    'category'          => 'Catégorie par défaut',
                    'category-info'     => 'Utiliser la taxonomie Google, par exemple Vêtements & Accessoires lien https://support.google.com/merchants/answer/6324436?hl=fr',
                    'weight-unit'       => 'Unité de poids',
                    'new'               => 'Nouveau',
                    'old'               => 'Ancien',
                    'male'              => 'Homme',
                    'female'            => 'Femme',
                    'kids'              => 'Enfants',
                    'adult'             => 'Adulte',
                    'child'             => 'Enfant',
                    'age-group'         => 'Groupe d\'âge',
                    'available-for'     => 'Produit disponible pour',
                    'product-condition' => 'État du produit',
                    'tax-apply-on-ship' => 'Taxe appliquée sur l\'expédition',
                    'tax-apply-as'      => 'Taxe d\'achat appliquée comme',
                    'tax-rate'          => 'Taux de taxe',
                    'target-country'    => 'Pays cible',
                ],
            ],
        ],

        'layouts' => [
            'google-feed' => 'Flux de Shopping Google',
            'category'    => 'Mapper la catégorie',
            'product'     => 'Produits',
            'attribute'   => 'Mapper l\'attribut',

            'settings' => [
                'title'                 => 'Flux de Shopping Google',
                'auth'                  => 'Authentifier le compte',
                'auth-btn'              => 'Authentifier',
                'auth-refresh-btn'      => 'Rafraîchir le jeton',
                'api-key'               => 'Clé d\'authentification Oauth',
                'google-api-secret-key' => 'Clé secrète d\'authentification Google',
                'api-secret-key'        => 'Clé secrète d\'authentification Oauth',
                'auth-success'          => 'Authentification réussie',
                'refreshed-token'       => 'Le jeton d\'accès a été rafraîchi avec succès',
            ],
        ],

        'attribute' => [
            'title' => 'Mapper l\'attribut du produit Google',
            
            'index' => [
                'product-id'      => 'ID du produit',
                'title-id'        => 'Titre',
                'description-id'  => 'Description',
                'gtin-id'         => 'GTIN',
                'brand-id'        => 'Marque',
                'color-id'        => 'Couleur',
                'weight-id'       => 'Poids de livraison',
                'image-id'        => 'Lien de l\'image',
                'size-id'         => 'Taille',
                'size-system-id'  => 'Système de taille',
                'size-type-id'    => 'Type de taille',
                'mpn-id'          => 'MPN',
                'save-btn-title'  => 'ENREGISTRER',
                'reset-btn-title' => 'Rafraîchir',
            ],

            'save-success'   => 'Attributs mappés enregistrés avec succès',
            'update-success' => 'Attributs mappés mis à jour avec succès',
            'delete-success' => 'Rafraîchi avec succès',
            'delete-failed'  => 'Erreur ! La suppression a échoué.',
        ],

        'map-categories' => [
            'success-save'   => 'Catégorie mappée avec succès',
            'success-delete' => 'La catégorie mappée a été supprimée avec succès',

            'index' => [
                'title'         => 'Mapper les catégories Google',
                'map-btn-title' => 'Mapper une nouvelle catégorie',

                'datagrid' => [
                    'id'          => 'Id',
                    'delete'      => 'Supprimer',
                    'store-name'  => 'Nom de la catégorie du magasin',
                    'google-name' => 'Nom de la catégorie Google',
                ],
            ],

            'create' => [
                'add-title'                     => 'Mapper une nouvelle catégorie',
                'refresh'                       => 'Rafraîchir',
                'save'                          => 'Enregistrer',
                'select-category'               => 'Sélectionner une catégorie',
                'entry-choose-bagisto-category' => 'Choisir une catégorie du magasin',
                'entry-select-bagisto-category' => 'Sélectionner une catégorie du magasin',
                'entry-choose-origin-category'  => 'Choisir une catégorie Google',
            ],
        ],

        'product' => [
            'index'  => [
                'title'     => 'Exporter vers Google Shop',
                'add-title' => 'Ajouter une page CMS',
            ],

            'export' => [
                'title'       => 'Exporter le produit',
                'please-wait' => 'Veuillez patienter. Le produit est en cours de téléchargement.',
            ],

            'refresh'              => "Votre jeton d'accès a expiré. Veuillez rafraîchir votre jeton.",
            'something-went-wrong' => "Une erreur s'est produite. Veuillez réessayer.",
            'map-attribute-failed' => 'Veuillez mapper les attributs et réessayer.',
            'export-success'       => 'Produits exportés avec succès.',
        ],

        'store' => [
            'select-store-category'  => 'Veuillez sélectionner une catégorie du magasin',
            'select-google-category' => 'Veuillez sélectionner une catégorie Google',
        ],
    ],

    'acl' => [
        'google-feed' => 'Flux Google Shopping',
        'category'    => 'Catégoriser',
        'product'     => 'Produits',
        'attribute'   => 'Attribuer des propriétés',
        'refresh'     => 'Actualiser',
        'destroy'     => 'Détruire',
        'export'      => 'Exporter',
        'create'      => 'Créer',
        'auth'        => 'Authentifier',
    ],
];