<?php

namespace Webkul\Blog\Datagrids;

use Illuminate\Support\Facades\DB;
use Webkul\Blog\Repositories\BlogCategoryRepository;
use Webkul\Blog\Repositories\BlogTagRepository;
use Webkul\DataGrid\DataGrid;

class BlogDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     */
    public function prepareQueryBuilder()
    {
        $loggedIn_user = auth()->guard('admin')->user()->toarray();

        $user_id = (array_key_exists('id', $loggedIn_user)) ? $loggedIn_user['id'] : 0;

        $role = (array_key_exists('role', $loggedIn_user)) ? (array_key_exists('name', $loggedIn_user['role']) ? $loggedIn_user['role']['name'] : 'Administrator') : 'Administrator';

        $queryBuilder = DB::table('blogs');

        if ($role != 'Administrator') {
            $queryBuilder->where('blogs.author_id', $user_id);
        }

        $queryBuilder->select(
            'blogs.id',
            'blogs.name',
            'blogs.slug',
            'blogs.short_description',
            'blogs.description',
            'blogs.channels',
            'blogs.default_category',
            'blogs.categorys',
            'blogs.published_at',
            'blogs.author',
            'blogs.tags',
            'blogs.src',
            'blogs.status',
            'blogs.allow_comments',
            'blogs.published_at',
            'blogs.meta_title',
            'blogs.meta_description',
            'blogs.meta_keywords'
        );

        return $queryBuilder;
    }

    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'id',
            'label'      => trans('blog::app.datagrids.blog.id'),
            'type'       => 'integer',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'name',
            'label'      => trans('blog::app.datagrids.blog.name'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'default_category',
            'label'      => trans('blog::app.datagrids.blog.category'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                $catagories = '-';

                $defaultCategory = explode(',', $row->default_category);

                $catagories = explode(',', $row->categorys);

                $allCatagories = array_merge($defaultCategory, $catagories);

                $categoriesIds = array_values(array_unique($allCatagories));

                if (! empty($categoriesIds)) {
                    $categories = app(BlogCategoryRepository::class)->whereIn('id', $categoriesIds)->get();

                    $categoriesNames = ! empty($categories) ? $categories->pluck('name')->toarray() : [];

                    $catagories = ! empty($categoriesNames) ? implode(', ', $categoriesNames) : '-';
                }

                return $catagories;
            },
        ]);

        $this->addColumn([
            'index'      => 'tags',
            'label'      => trans('blog::app.datagrids.blog.tags'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($value) {
                $tags = '-';

                $tagIds = array_values(array_unique(explode(',', $value->tags)));

                if (! empty($tagIds)) {
                    $tagDetails = app(BlogTagRepository::class)->whereIn('id', $tagIds)->get();

                    $tagNames = ! empty($tagDetails) ? $tagDetails->pluck('name')->toarray() : [];

                    $tags = ! empty($tagNames) ? implode(', ', $tagNames) : '-';
                }

                return $tags;
            },
        ]);

        $this->addColumn([
            'index'      => 'status',
            'label'      => trans('blog::app.datagrids.blog.status'),
            'type'       => 'boolean',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                if ($row->status) {
                    return '<span class="badge badge-md badge-success label-active">'.trans('blog::app.datagrids.blog.active').'</span>';
                }

                return '<span class="badge badge-md badge-danger label-info">'.trans('blog::app.datagrids.blog.reactive').'</span>';
            },
        ]);

        $this->addColumn([
            'index'      => 'allow_comments',
            'label'      => trans('blog::app.datagrids.blog.allow-comments'),
            'type'       => 'boolean',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                if ($row->allow_comments) {
                    return '<span class="badge badge-md badge-success label-active">'.trans('blog::app.datagrids.blog.yes').'</span>';
                } 

                return '<span class="badge badge-md badge-danger label-info">'.trans('blog::app.datagrids.blog.no').'</span>';
            },
        ]);

        $this->addColumn([
            'index'      => 'published_at',
            'label'      => trans('blog::app.datagrids.blog.published-at'),
            'type'       => 'datetime',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                if ($row->published_at != '' 
                    && $row->published_at != null) {
                    return date_format(date_create($row->published_at), 'j F, Y');
                }

                return '-';
            },
        ]);

        $this->addColumn([
            'index'      => 'author',
            'label'      => trans('blog::app.datagrids.blog.author'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);
    }

    public function prepareActions()
    {
        if (bouncer()->hasPermission('blog.blogs.edit')) {
            $this->addAction([
                'title'  => trans('blog::app.datagrids.blog.edit'),
                'method' => 'GET',
                'icon'   => 'icon-edit',
                'route'  => 'admin.blog.edit',
                'url'    => function ($row) {
                    return route('admin.blog.edit', $row->id);
                },
            ]);
        }

        if (bouncer()->hasPermission('blog.blogs.delete')) {
            $this->addAction([
                'title'  => trans('blog::app.datagrids.blog.delete'),
                'method' => 'POST',
                'icon'   => 'icon-delete',
                'route'  => 'admin.blog.delete',
                'url'    => function ($row) {
                    return route('admin.blog.delete', $row->id);
                },
            ]);
        }
    }

    public function prepareMassActions()
    {
        if (bouncer()->hasPermission('blog.blogs.delete')) {
            $this->addMassAction([
                'type'   => 'delete',
                'label'  => trans('blog::app.blog.index.mass-ops.success'),
                'title'  => trans('blog::app.datagrids.blog.delete'),
                'action' => route('admin.blog.mass-delete'),
                'url'    => route('admin.blog.mass-delete'),
                'method' => 'POST',
            ]);
        }
    }
}