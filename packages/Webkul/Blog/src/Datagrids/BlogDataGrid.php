<?php

namespace Webkul\Blog\Datagrids;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class BlogDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('blogs');

        $queryBuilder->select(
            'blogs.id',
            'blogs.name',
            'blogs.slug',
            'blogs.short_description',
            'blogs.description',
            'blogs.channels',
            'blogs.published_at',
            'blogs.src',
            'blogs.author',
            'blogs.status',
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
            'index'      => 'status',
            'label'      => trans('blog::app.datagrids.blog.status'),
            'type'       => 'boolean',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                if ($row->status) {
                    return '<span class="badge badge-md badge-success label-active">' . trans('blog::app.datagrids.blog.active') . '</span>';
                }

                return '<span class="badge badge-md badge-danger label-info">' . trans('blog::app.datagrids.blog.reactive') . '</span>';
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

        $this->addColumn([
            'index'      => 'published_at',
            'label'      => trans('blog::app.datagrids.blog.published-at'),
            'type'       => 'datetime',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                return Carbon::parse($row->published_at)->format('j F, Y');
            },
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
