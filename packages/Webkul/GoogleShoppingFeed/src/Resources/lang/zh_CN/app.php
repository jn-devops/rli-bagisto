<?php

return [
    'admin' => [
        'configuration' => [
            'settings' => [
                'title' => 'Google购物供稿',
                'info'  => 'Google购物供稿',

                'general' => [
                    'title'                 => '一般的',
                    'info'                  => "设置模块状态、Google应用程序名称、Google OAuth密钥和商家ID。" ,
                    'enable-module'         => '启用模块',
                    'application-name'      => '设置 Google 应用名称',
                    'google-api-key'        => 'Google Oauth键',
                    'google-api-secret-key' => 'googleOauthSecretKey',
                    'google-merchant-id'    => 'googleShopMerchantId',
                ],

                'default' => [
                    'title'             => '默认配置',
                    'info'              => '设置默认类别、重量单位、年龄组、产品可用性、条件和目标国家',
                    'category'          => '默认类别',
                    'category-info'     => '使用Google分类法 , 即服装和配件链接https://support.google.com/merchants/merchants/answer/6324436?hl = en' ,
                    'weight-unit'       => '重量单位',
                    'new'               => '新的',
                    'old'               => '老的',
                    'male'              => '男性',
                    'female'            => '女性',
                    'kids'              => '孩子们',
                    'adult'             => '成人',
                    'child'             => '孩子',
                    'age-group'         => '年龄阶层',
                    'available-for'     => '产品可用于',
                    'product-condition' => '产品条件',
                    'tax-apply-on-ship' => '征税',
                    'tax-apply-as'      => '购物税作为',
                    'tax-rate'          => '税率',
                    'target-country'    => '目标国家',
                ],
            ],
        ],

        'layouts' => [
            'google-feed' => 'Google购物供稿',
            'category'    => '地图类别',
            'product'     => '产品',
            'attribute'   => '地图属性',

            'settings' => [
                'title'                 => 'Google购物供稿',
                'auth'                  => '认证帐户',
                'auth-btn'              => '认证',
                'auth-refresh-btn'      => '刷新令牌',
                'api-key'               => 'OAuth API键',
                'google-api-secret-key' => 'Google Oauth秘密钥匙',
                'api-secret-key'        => 'Oauth API秘密钥匙',
                'auth-success'          => '成功身份验证',
                'refreshed-token'       => '访问令牌已成功刷新' ,
            ],
        ],

        'attribute' => [
            'title' => '地图Google产品属性',
            
            'index' => [
                'product-id'      => '产品ID',
                'title-id'        => '标题',
                'description-id'  => '描述',
                'gtin-id'         => 'gtin',
                'brand-id'        => '品牌',
                'color-id'        => '颜色',
                'weight-id'       => '装运重量',
                'image-id'        => '图像链接',
                'size-id'         => '尺寸',
                'size-system-id'  => '尺寸系统',
                'size-type-id'    => '尺码类型',
                'mpn-id'          => 'mpn',
                'save-btn-title'  => '节省',
                'reset-btn-title' => '刷新',
            ],

            'save-success'   => '成功保存的映射属性',
            'update-success' => '映射属性成功更新',
            'delete-success' => '刷新成功',
            'delete-failed'  => '错误！删除失败。',
        ],

        'map-categories' => [
            'success-save'   => '类别映射成功',
            'success-delete' => '映射类别已成功删除',

            'index' => [
                'title'         => '地图Google类别',
                'map-btn-title' => '地图新类别',

                'datagrid' => [
                    'id'          => 'ID',
                    'delete'      => '删除',
                    'store-name'  => '商店类别名称',
                    'google-name' => 'Google类别名称',
                ],
            ],
            'create' => [
                'add-title'                     => '映射新类别',
                'refresh'                       => '刷新',
                'save'                          => '保存',
                'select-category'               => '选择类别',
                'entry-choose-bagisto-category' => '选择商店类别',
                'entry-select-bagisto-category' => '选择商店类别',
                'entry-choose-origin-category'  => '选择Google类别',
            ],
        ],

        'product' => [
            'index'  => [
                'title'     => '导出的产品',
                'add-title' => '添加CMS页面',
            ],

            'export' => [
                'title'       => '导出到Google商店',
                'please-wait' => '请稍等。产品正在上传。',
            ],

            'refresh'              => '您的访问令牌已过期。请刷新您的令牌。',
            'something-went-wrong' => '发生了一些问题。请重试。',
            'map-attribute-failed' => '请映射属性并重试。',
            'export-success'       => '产品成功导出。',
        ],

        'store' => [
            'select-store-category'  => '请选择商店类别',
            'select-google-category' => '请选择谷歌类别',
        ],
    ],

    'acl' => [
        'google-feed' => 'Google购物Feed',
        'category'    => '映射类别',
        'product'     => '产品',
        'attribute'   => '映射属性',
        'refresh'     => '刷新',
        'destroy'     => '销毁',
        'export'      => '导出',
        'create'      => '创建',
        'auth'        => '认证',
    ],
];