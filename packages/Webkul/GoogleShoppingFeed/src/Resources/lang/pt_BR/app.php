<?php

return [
    'admin' => [
        'configuration' => [
            'settings' => [
                'title' => 'Feed de Compras do Google',
                'info'  => 'Feed de Compras do Google',

                'general' => [
                    'title'                 => 'Geral',
                    'info'                  => 'Defina o estado do módulo, nome do aplicativo Google, chaves OAuth do Google e ID do comerciante.',
                    'enable-module'         => 'Ativar Módulo',
                    'application-name'      => 'Definir nome do aplicativo Google',
                    'google-api-key'        => 'Chave Oauth do Google',
                    'google-api-secret-key' => 'Chave Secreta Oauth do Google',
                    'google-merchant-id'    => 'ID do Comerciante da Loja do Google',
                ],

                'default' => [
                    'title'             => 'Configuração Padrão',
                    'info'              => 'Defina a categoria padrão, unidade de peso, grupo etário, disponibilidade do produto, condições e país-alvo.',
                    'category'          => 'Categoria Padrão',
                    'category-info'     => 'Use a taxonomia do Google, por exemplo, Vestuário e Acessórios link https://support.google.com/merchants/answer/6324436?hl=pt-BR',
                    'weight-unit'       => 'Unidade de Peso',
                    'new'               => 'Novo',
                    'old'               => 'Usado',
                    'male'              => 'Masculino',
                    'female'            => 'Feminino',
                    'kids'              => 'Infantil',
                    'adult'             => 'Adulto',
                    'child'             => 'Criança',
                    'age-group'         => 'Faixa Etária',
                    'available-for'     => 'Produto Disponível Para',
                    'product-condition' => 'Condição do Produto',
                    'tax-apply-on-ship' => 'Imposto Aplicado no Envio',
                    'tax-apply-as'      => 'Imposto de Compras Aplicado Como',
                    'tax-rate'          => 'Taxa de Imposto',
                    'target-country'    => 'País Alvo',
                ],
            ],
        ],

        'layouts' => [
            'google-feed' => 'Feed de Compras do Google',
            'category'    => 'Mapear Categoria',
            'product'     => 'Produtos',
            'attribute'   => 'Mapear Atributo',

            'settings'   => [
                'title'                 => 'Feed de Compras do Google',
                'auth'                  => 'Autenticar Conta',
                'auth-btn'              => 'Autenticar',
                'auth-refresh-btn'      => 'Atualizar Token',
                'api-key'               => 'Chave da API Oauth',
                'google-api-secret-key' => 'Chave Secreta Oauth do Google',
                'api-secret-key'        => 'Chave Secreta da API Oauth',
                'auth-success'          => 'Autenticado com sucesso',
                'refreshed-token'       => 'Token de acesso atualizado com sucesso',
            ],
        ],

        'attribute' => [
            'title' => 'Mapear Atributo de Produto do Google',
            
            'index' => [
                'product-id'      => 'ID do Produto',
                'title-id'        => 'Título',
                'description-id'  => 'Descrição',
                'gtin-id'         => 'GTIN',
                'brand-id'        => 'Marca',
                'color-id'        => 'Cor',
                'weight-id'       => 'Peso de Envio',
                'image-id'        => 'Link da Imagem',
                'size-id'         => 'Tamanho',
                'size-system-id'  => 'Sistema de Tamanho',
                'size-type-id'    => 'Tipo de Tamanho',
                'mpn-id'          => 'MPN',
                'save-btn-title'  => 'SALVAR',
                'reset-btn-title' => 'Atualizar',
            ],

            'save-success'   => 'Atributos mapeados salvos com sucesso',
            'update-success' => 'Atributos mapeados atualizados com sucesso',
            'delete-success' => 'Atualizado com sucesso',
            'delete-failed'  => 'Erro! Falha ao excluir.',
        ],
        
        'map-categories' => [
            'success-save'   => 'Categoria mapeada com sucesso',
            'success-delete' => 'Categoria mapeada excluída com sucesso',

            'index' => [
                'title'         => 'Mapear Categorias do Google',
                'map-btn-title' => 'Mapear nova Categoria',

                'datagrid' => [
                    'id'          => 'Id',
                    'delete'      => 'Excluir',
                    'store-name'  => 'Nome da Categoria da Loja',
                    'google-name' => 'Nome da Categoria do Google',
                ],
            ],

            'create' => [
                'add-title'                     => 'Mapear Nova Categoria',
                'refresh'                       => 'Atualizar',
                'save'                          => 'Salvar',
                'select-category'               => 'Selecionar Categoria',
                'entry-choose-bagisto-category' => 'Escolher Categoria da Loja',
                'entry-select-bagisto-category' => 'Selecionar categoria da loja',
                'entry-choose-origin-category'  => 'Escolher Categoria do Google',
            ],
        ],

        'product' => [
            'index'  => [
                'title'     => 'Exportar para o Google Shop',
                'add-title' => 'Adicionar Página CMS',
            ],

            'export' => [
                'title'       => 'Exportar Produto',
                'please-wait' => 'Por favor, aguarde. O produto está sendo carregado.',
            ],

            'refresh'              => 'Seu token de acesso expirou. Por favor, atualize seu token.',
            'something-went-wrong' => 'Algo deu errado. Por favor, tente novamente.',
            'map-attribute-failed' => 'Por favor, mapeie os atributos e tente novamente.',
            'export-success'       => 'Produtos exportados com sucesso.',
        ],

        'store' => [
            'select-store-category'  => 'Por favor, selecione a categoria da loja',
            'select-google-category' => 'Por favor, selecione a categoria do Google',
        ],
    ],

    'acl' => [
        'google-feed' => 'Feed do Google Shopping',
        'category'    => 'Mapear Categoria',
        'product'     => 'Produtos',
        'attribute'   => 'Mapear Atributo',
        'refresh'     => 'Atualizar',
        'destroy'     => 'Destruir',
        'export'      => 'Exportar',
        'create'      => 'Criar',
        'auth'        => 'Autenticar',
    ],
];