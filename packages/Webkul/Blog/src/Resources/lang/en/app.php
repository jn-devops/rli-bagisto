<?php

return [
    'config' => [
        'admin-menu' => [
            'title'      => 'News & Updates',
            'posts'      => 'Posts',
            'categories' => 'Categories',
            'tags'       => 'Tags',
            'comments'   => 'Comments',
            'setting'    => 'Settings',
        ],
        'settings' => [
            'title'     => 'Blog',
            'info'      => 'Configure',
            'settings'  => 'Settings',
            'info'      => 'Configure',
            'mega-info' => 'Update Status',
            
            'general' => [
                'title'     => 'Blog General',
                'mega-info' => 'Update Status',
                'status'    => 'Status',
            ],
        ],
    ],

    'blog' => [
        'index' => [
            'title'          => 'Posts',
            'create-btn'     => 'Create Post',

            'success' => [
                'message' => 'Blog deleted successfully',
            ],

            'error' => [
                'message' => 'An error occurred while deleting the blog.',
            ],

            'mass-ops' => [
                'success' => 'Blogs deleted successfully',
                'error'   => "Blogs can't Delete",
            ],
        ],

        'create' => [
            'title'                      => 'Add Blog',
            'back-btn'                   => 'Back',
            'save-btn'                   => 'Save',
            'general'                    => 'General',
            'name'                       => 'Name',
            'slug'                       => 'Slug',
            'channels'                   => 'Channels',
            'short-description'          => 'Short Description',
            'description-and-images'     => 'Description and Images',
            'description'                => 'Description',
            'image'                      => 'Image',
            'search-engine-optimization' => 'Search Engine Optimization',
            'meta-title'                 => 'Meta Title',
            'meta-description'           => 'Meta Description',
            'meta-keywords'              => 'Meta Keywords',
            'settings'                   => 'Settings',
            'published_at'               => 'Published At',
            'status'                     => 'Status',
            'allow_comments'             => 'Allow Comments',
            'author'                     => 'Author',
            'select-author'              => 'Select Author',
            'default-category'           => 'Default Category',
            'select-default-category'    => 'Select Default Category',
            'additional-categories'      => 'Additional Categories',
            'tag-title'                  => 'Tags',

            'success' => [
                'message' => 'Blog created successfully.',
            ],

            'failure' => [
                'message' => 'An error occurred while creating a blog.',
            ],
        ],

        'edit' => [
            'title'                      => 'Add Blog',
            'back-btn'                   => 'Back',
            'save-btn'                   => 'Save',
            'general'                    => 'General',
            'name'                       => 'Name',
            'slug'                       => 'Slug',
            'channels'                   => 'Channels',
            'short-description'          => 'Short Description',
            'description-and-images'     => 'Description and Images',
            'description'                => 'Description',
            'image'                      => 'Image',
            'search-engine-optimization' => 'Search Engine Optimization',
            'meta-title'                 => 'Meta Title',
            'meta-description'           => 'Meta Description',
            'meta-keywords'              => 'Meta Keywords',
            'settings'                   => 'Settings',
            'published_at'               => 'Published At',
            'status'                     => 'Status',
            'allow-comments'             => 'Allow Comments',
            'author'                     => 'Author',
            'select-author'              => 'Select Author',
            'default-category'           => 'Default Category',
            'select-default-category'    => 'Select Default Category',
            'additional-categories'      => 'Additional Categories',
            'tag-title'                  => 'Tags',

            'success' => [
                'message' => 'Blog updated successfully.',
            ],

            'failure' => [
                'message' => 'An error occurred while creating a blog.',
            ],
        ],
    ],

    'datagrids' => [
        'blog' => [
            'id'             => 'ID',
            'name'           => 'Name',
            'content'        => 'Content',
            'author'         => 'Author',
            'category'       => 'Categories',
            'status'         => 'Status',
            'tags'           => 'Tags',
            'allow-comments' => 'Allow Comments',
            'published-at'   => 'Published At',
            'author'         => 'Author',
            'edit'           => 'Edit',
            'delete'         => 'Delete',
            'active'         => 'Active',
            'reactive'       => 'Reactive',
            'yes'            => 'Yes',
            'no'             => 'No',
        ],
    ],

    'setting' => [
        'index' => [
            'title'    => 'Settings',
            'save-btn' => 'Save',
            'success'  => 'Save Blog Setting Successfully',

            'post' => [
                'title'               => 'Post Setting',
                'per-page-record'     => 'Per Page Record',
                'max-posts-allow'     => 'Maximum Related Posts Allowed',
                'category-post-count' => 'Show Categories With Posts Count',
                'tag-post-count'      => 'Show Tags With Posts Count',
                'author-page'         => 'Show Author Page',
            ],
            
            'seo' => [
                'title'            => 'Default Blog SEO Setting',
                'meta-title'       => 'Meta Title',
                'meta-keywords'    => 'Meta Keywords',
                'meta-description' => 'Meta Description',
            ],
        ],
    ],

    'shop' => [
        'blog' => [
            'title'            => 'Blog',
            'news_and_updates' => "News & Updates",
            'details_page'     => "Details Page",
            'read-more'        => 'Read More',
            'load-more'        => 'Load More',
            'loading'          => 'Loading...',

            'post' => [
                'view' => [
                    'author'         => 'Author:',
                    'date-published' => 'Date published:',
                    'check-out-news' => 'Check out our other news & updates',
                ],
    
                'index' => [
                    'title'     => 'News & Updates',
                    'no-record' => 'No Records available!',
                ],
            ],
        ],
    ],
];
