<?php

namespace Webkul\Blog\Datagrids;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;
use Webkul\Blog\Repositories\BlogCategoryRepository;

class CategoryDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('blog_categories')
            ->select('id')
            ->addSelect(
                'id',
                'name',
                'slug',
                'status',
                'description',
                'meta_title',
                'meta_description',
                'meta_keywords',
                'parent_id'
            );

        return $queryBuilder;
    }

    /**
     * Prepare columns.
     */
    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'id',
            'label'      => trans('blog::app.datagrids.category.id'),
            'type'       => 'number',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'name',
            'label'      => trans('blog::app.datagrids.category.name'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'parent_id',
            'label'      => 'Parent',
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                $parentCategory = app(BlogCategoryRepository::class)
                                ->where('id', (int) $row->parent_id)
                                ->first();

                return $parentCategory?->name ?? '-';
            },
        ]);

        $this->addColumn([
            'index'      => 'status',
            'label'      => trans('blog::app.datagrids.category.status.title'),
            'type'       => 'boolean',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                if ($row->status) {
                    return '<span class="badge badge-md badge-success label-active">' . trans('blog::app.datagrids.category.status.active') . '</span>';
                }

                return '<span class="badge badge-md badge-danger label-info">' . trans('blog::app.datagrids.category.status.in-active') . '</span>';
            },
        ]);
    }

    /**
     * Prepare actions.
     */
    public function prepareActions()
    {
        if (bouncer()->hasPermission('blog.category.edit')) {
            $this->addAction([
                'title'  => trans('blog::app.datagrids.category.edit'),
                'method' => 'GET',
                'route'  => 'admin.blog.category.edit',
                'icon'   => 'icon-edit',
                'url'    => function ($row) {
                    return route('admin.blog.category.edit', $row->id);
                },
            ]);
        }

        if (bouncer()->hasPermission('blog.category.delete')) {
            $this->addAction([
                'title'  => trans('blog::app.datagrids.category.delete'),
                'method' => 'POST',
                'route'  => 'admin.blog.category.delete',
                'icon'   => 'icon-delete',
                'url'    => function ($row) {
                    return route('admin.blog.category.delete', $row->id);
                },
            ]);
        }
    }

    /**
     * Prepare mass actions
     */
    public function prepareMassActions()
    {
        if (bouncer()->hasPermission('blog.category.delete')) {
            $this->addMassAction([
                'type'   => 'delete',
                'label'  => trans('blog::app.datagrids.category.delete'),
                'title'  => trans('blog::app.datagrids.category.delete'),
                'action' => route('admin.blog.category.mass-delete'),
                'url'    => route('admin.blog.category.mass-delete'),
                'method' => 'POST',
            ]);
        }
    }
}
