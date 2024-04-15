<?php

return [
    'config' => [
        'admin-menu' => [
            'title'      => 'Blog',
            'posts'      => 'Posts',
            'categories' => 'Categories',
            'tags'       => 'Tags',
            'comments'   => 'Comments',
            'setting'    => 'Settings',
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

    'category' => [
        'index' => [
            'title'    => 'Categories',
            'save-btn' => 'Create Category',

            'delete' => [
                'success' => 'Category deleted successfully',
                'failure' => 'Category cannot be deleted',
            ],
        ],

        'create' => [
            'title'                      => 'Add Blog Category',
            'back-btn'                   => 'Back',
            'save-btn'                   => 'Create Category',
            'general'                    => 'General',
            'name'                       => 'Name',
            'slug'                       => 'Slug',
            'status'                     => 'Status',
            'description-and-images'     => 'Description and Images',
            'image'                      => 'Image',
            'search-engine-optimization' => 'Search Engine Optimization',
            'meta-title'                 => 'Meta Title',
            'meta-description'           => 'Meta Description',
            'meta-keywords'              => 'Meta Keywords',
            'settings'                   => 'Settings',
            'parent-category'            => 'Parent Category',

            'created' => [
                'success' => 'Category Update successfully',
                'failure' => 'An error occurred while updating the category.',
            ],
        ],

        'edit' => [
            'title'                      => 'Edit Blog Category',
            'back-btn'                   => 'Back',
            'save-btn'                   => 'Save Category',
            'general'                    => 'General',
            'name'                       => 'Name',
            'slug'                       => 'Slug',
            'description-and-images'     => 'Description and Images',
            'description'                => 'Description',
            'image'                      => 'Image',
            'search-engine-optimization' => 'Search Engine Optimization',
            'meta-title'                 => 'Meta Title',
            'meta-description'           => 'Meta Description',
            'meta-keywords'              => 'Meta Keywords',
            'settings'                   => 'Settings',
            'status'                     => 'Status',
            'parent-category'            => 'Parent Category',

            'updated' => [
                'success' => 'Category Update successfully',
                'failure' => 'An error occurred while updating the category.',
            ],
        ],
    ],

    'tag' => [
        'index' => [
            'title'      => 'Tags',
            'create-tag' => 'Create Tag',
            'status'     => [
                'active'   => 'Active',
                'reactive' => 'Reactive',
            ],
            'deleted' => [
                'success' => 'Tag deleted successfully',
                'failure' => 'Tag deleted successfully',
            ],

            'partial-action' => 'Some actions were not performed due restricted system constraints on Tag',
            'method-error'   => 'Error! Wrong method detected, please check mass action configuration',
        ],

        'edit' => [
            'title'                      => 'Edit Tag',
            'back-btn'                   => 'Back',
            'save-btn'                   => 'Save Tag',
            'general'                    => 'General',
            'name'                       => 'Name',
            'slug'                       => 'Slug',
            'description'                => 'Description',
            'search-engine-optimization' => 'Search Engine Optimization',
            'meta-title'                 => 'Meta Title',
            'meta-description'           => 'Meta Description',
            'meta-keywords'              => 'Meta Keywords',
            'create-btn-title'           => 'Save Tag',
            'status'                     => 'Status',
            'updated'                    => [
                'success' => 'Tag updated successfully',
                'failure' => 'Tag cannot be updated',
            ],
        ],

        'create' => [
            'title'                      => 'Add Blog Tag',
            'back-btn'                   => 'Back',
            'save-btn'                   => 'Save',
            'general'                    => 'General',
            'name'                       => 'Name',
            'slug'                       => 'Slug',
            'description'                => 'Description',
            'search-engine-optimization' => 'Search Engine Optimization',
            'meta-title'                 => 'Meta Title',
            'meta-description'           => 'Meta Description',
            'meta-keywords'              => 'Meta Keywords',
            'status'                     => 'Status',
            'created'                    => [
                'success' => 'Tag created successfully',
                'failure' => 'An error occurred while creating a tag.',
            ],
        ],
    ],

    'comments' => [
        'index' => [
            'title'   => 'Comments',
            'deleted' => [
                'success' => 'Comment deleted successfully',
                'failure' => "Comment can't be deleted",
            ],
            'method-error'    => 'Error! Wrong method detected, please check mass action configuration',
            'partial-action'  => 'Some actions were not performed due restricted system constraints on :resource',
        ],

        'edit' => [
            'title'           => 'Edit Comment',
            'settings'        => 'Settings',
            'btn-title'       => 'Save Comment',
            'back-btn'        => 'Back',
            'post'            => 'Post',
            'name'            => 'Name',
            'comment-date'    => 'Comment Date',
            'comment'         => 'Comment',
            'general'         => 'General',
            'email'           => 'Email',

            'status' => [
                'title'    => 'Status',
                'pending'  => 'Pending',
                'approved' => 'Approved',
                'rejected' => 'Rejected',
            ],

            'updated' => [
                'success' => 'Comment updated successfully',
                'failure' => "Comment can't be updated",
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

        'category' => [
            'id'             => 'ID',
            'name'           => 'Name',
            'content'        => 'Content',
            'author'         => 'Author',
            'category'       => 'Categories',
            'status'         => [
                'title'     => 'Status',
                'active'    => 'Active',
                'in-active' => 'Inactive',
            ],
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

        'comment' => [
            'id'             => 'ID',
            'name'           => 'Name',
            'content'        => 'Content',
            'status'         => [
                'title'    => 'Status',
                'pending'  => 'Pending',
                'approved' => 'Approved',
                'rejected' => 'Rejected',
            ],
            'published-at'   => 'Published At',
            'edit'           => 'Edit',
            'delete'         => 'Delete',
            'active'         => 'Active',
            'reactive'       => 'Reactive',
            'yes'            => 'Yes',
            'no'             => 'No',
        ],

        'tag' => [
            'id'     => 'ID',
            'name'   => 'Name',
            'status' => [
                'title'     => 'Status',
                'active'    => 'Active',
                'in-active' => 'Inactive',
            ],
            'edit'           => 'Edit',
            'delete'         => 'Delete',
            'active'         => 'Active',
            'reactive'       => 'Reactive',
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

            'comment' => [
                'title'                        => 'Comment Setting',
                'status'                       => 'Status',
                'allow-guest-comment'          => 'Allow Guest Comment',
                'allow-maximum-nested-comment' => 'Allowed maximum nested comment level',
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
