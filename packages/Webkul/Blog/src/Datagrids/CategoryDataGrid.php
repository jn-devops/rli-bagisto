<?php

namespace Webkul\Blog\Datagrids;

use Illuminate\Support\Facades\DB;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\DataGrid\DataGrid;

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
            'label'      => trans('blog::app.datagrid.id'),
            'type'       => 'number',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'name',
            'label'      => trans('blog::app.datagrid.name'),
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
                $parent_data = app(CategoryRepository::class)->where('id', (int) $row->parent_id)->first();
                
                $parent_category_name = ($parent_data && isset($parent_data->name) && ! empty($parent_data->name) && ! is_null($parent_data->name)) ? $parent_data->name : '-';

                return $parent_category_name;
            },
        ]);

        $this->addColumn([
            'index'      => 'status',
            'label'      => trans('blog::app.datagrid.status'),
            'type'       => 'boolean',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                if ($row->status) {
                    return '<span class="badge badge-md badge-success label-active">'.trans('blog::app.category.status-true').'</span>';
                }

                return '<span class="badge badge-md badge-danger label-info">'.trans('blog::app.category.status-false').'</span>';
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
                'title'  => 'edit',
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
                'title'  => 'delete',
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
                'label'  => trans('admin::app.datagrid.delete'),
                'title'  => 'Delete',
                'action' => route('admin.blog.category.massdelete'),
                'url'    => route('admin.blog.category.massdelete'),
                'method' => 'POST',
            ]);
        }
    }
}