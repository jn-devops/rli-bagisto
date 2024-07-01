<?php

return [
    'admin' => [
        'configuration' => [
            'settings' => [
                'title' => 'Google Alışveriş Akışı',
                'info'  => 'Google Alışveriş Akışı',

                'general' => [
                    'title'                 => 'Genel',
                    'info'                  => 'Modül durumunu, Google uygulama adını, Google OAuth anahtarlarını ve Satıcı Kimliğini ayarlayın.',
                    'enable-module'         => 'Modülü Etkinleştir',
                    'application-name'      => 'Google Uygulama adını ayarla',
                    'google-api-key'        => 'Google Oauth Anahtarı',
                    'google-api-secret-key' => 'Google Oauth Gizli Anahtarı',
                    'google-merchant-id'    => 'Google Mağaza Satıcı ID',
                ],

                'default' => [
                    'title'             => 'Varsayılan Yapılandırma',
                    'info'              => 'Varsayılan kategori, ağırlık birimi, yaş grubu, ürün bulunabilirliği, koşullar ve hedef ülkeyi ayarlayın.',
                    'category'          => 'Varsayılan Kategori',
                    'category-info'     => 'Google taksonomisini kullanın, örneğin Giyim & Aksesuarlar bağlantısı https://support.google.com/merchants/answer/6324436?hl=tr',
                    'weight-unit'       => 'Ağırlık Birimi',
                    'new'               => 'Yeni',
                    'old'               => 'Eski',
                    'male'              => 'Erkek',
                    'female'            => 'Kadın',
                    'kids'              => 'Çocuklar',
                    'adult'             => 'Yetişkin',
                    'child'             => 'Çocuk',
                    'age-group'         => 'Yaş Grubu',
                    'available-for'     => 'Ürün Kullanılabilirliği',
                    'product-condition' => 'Ürün Durumu',
                    'tax-apply-on-ship' => 'Gönderi Üzerine Vergi Uygula',
                    'tax-apply-as'      => 'Alışveriş Vergisi Olarak Uygula',
                    'tax-rate'          => 'Vergi Oranı',
                    'target-country'    => 'Hedef Ülke',
                ],
            ],
        ],

        'layouts' => [
            'google-feed' => 'Google Alışveriş Akışı',
            'category'    => 'Kategori Eşleştirme',
            'product'     => 'Ürünler',
            'attribute'   => 'Özellik Eşleştirme',

            'settings' => [
                'title'                 => 'Google Alışveriş Akışı',
                'auth'                  => 'Hesabı Doğrula',
                'auth-btn'              => 'Doğrula',
                'auth-refresh-btn'      => 'Tokeni Yenile',
                'api-key'               => 'Oauth API Anahtarı',
                'google-api-secret-key' => 'Google Oauth Gizli Anahtarı',
                'api-secret-key'        => 'Oauth API Gizli Anahtarı',
                'auth-success'          => 'Başarıyla doğrulandı',
                'refreshed-token'       => 'Erişim tokeni başarıyla yenilendi',
            ],
        ],

        'attribute' => [
            'title' => 'Google Ürün Özelliklerini Eşleştir',
            
            'index' => [
                'product-id'      => 'Ürün ID',
                'title-id'        => 'Başlık',
                'description-id'  => 'Açıklama',
                'gtin-id'         => 'GTIN',
                'brand-id'        => 'Marka',
                'color-id'        => 'Renk',
                'weight-id'       => 'Kargo Ağırlığı',
                'image-id'        => 'Resim Linki',
                'size-id'         => 'Beden',
                'size-system-id'  => 'Beden Sistemi',
                'size-type-id'    => 'Beden Tipi',
                'mpn-id'          => 'MPN',
                'save-btn-title'  => 'KAYDET',
                'reset-btn-title' => 'Yenile',
            ],

            'save-success'   => 'Eşleştirilmiş özellikler başarıyla kaydedildi',
            'update-success' => 'Eşleştirilmiş özellikler başarıyla güncellendi',
            'delete-success' => 'Başarıyla yenilendi',
            'delete-failed'  => 'Hata! Silme işlemi başarısız oldu.',
        ],

        'map-categories' => [
            'success-save'   => 'Kategori başarıyla eşleştirildi',
            'success-delete' => 'Eşleştirilmiş kategori başarıyla silindi',
            'index' => [
                'title'         => 'Google Kategorilerini Eşleştir',
                'map-btn-title' => 'Yeni Kategori Eşleştir',

                'datagrid' => [
                    'id'          => 'Id',
                    'delete'      => 'Sil',
                    'store-name'  => 'Mağaza Kategori Adı',
                    'google-name' => 'Google Kategori Adı',
                ],
            ],

            'create' => [
                'add-title'                     => 'Yeni Kategori Eşleştir',
                'refresh'                       => 'Yenile',
                'save'                          => 'Kaydet',
                'select-category'               => 'Kategori Seç',
                'entry-choose-bagisto-category' => 'Mağaza Kategorisi Seçin',
                'entry-select-bagisto-category' => 'Mağaza kategorisi seçin',
                'entry-choose-origin-category'  => 'Google Kategorisi Seçin',
            ],
        ],

        'product' => [
            'index'  => [
                'title'     => 'Dışa Aktarılan Ürünler',
                'add-title' => 'CMS Sayfası Ekle',
            ],

            'export' => [
                'title'       => 'Google Mağazasına Aktar',
                'please-wait' => 'Lütfen bekleyin. Ürün yükleniyor.',
            ],

            'refresh'              => 'Erişim belirteciniz süresi dolmuş. Lütfen belirtecinizi yenileyin.',
            'something-went-wrong' => 'Bir şeyler yanlış gitti. Lütfen tekrar deneyin.',
            'map-attribute-failed' => 'Lütfen öznitelikleri eşleştirin ve tekrar deneyin.',
            'export-success'       => 'Ürünler başarıyla dışa aktarıldı.',
        ],

        'store' => [
            'select-store-category'  => 'Lütfen mağaza kategorisini seçin',
            'select-google-category' => 'Lütfen google kategorisini seçin',
        ],
    ],

    'acl' => [
        'google-feed' => 'Google Alışveriş Beslemesi',
        'category'    => 'Kategori Eşleştirme',
        'product'     => 'Ürünler',
        'attribute'   => 'Özellik Eşleştirme',
        'refresh'     => 'Yenile',
        'destroy'     => 'Yok Et',
        'export'      => 'Dışa Aktar',
        'create'      => 'Oluştur',
        'auth'        => 'Kimlik Doğrulama',
    ],
];
