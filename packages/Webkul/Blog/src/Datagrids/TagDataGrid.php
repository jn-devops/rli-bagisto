<?php

namespace Webkul\Blog\Datagrids;

use Illuminate\Support\Facades\DB;
use Webkul\Core\Models\Channel;
use Webkul\DataGrid\DataGrid;

class TagDataGrid extends DataGrid
{
    /**
     * 
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('blog_tags')->select('id')
            ->addSelect('id', 'name', 'slug', 'description', 'status', 'meta_title', 'meta_description', 'meta_keywords');

        return $queryBuilder;
    }

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
            'index'      => 'status',
            'label'      => trans('blog::app.datagrid.status'),
            'type'       => 'boolean',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                if ($row->status) {
                    return '<span class="badge badge-md badge-success label-active">'.trans('blog::app.tag.index.status.active').'</span>';
                }

                return '<span class="badge badge-md badge-danger label-info">'.trans('blog::app.tag.index.status.reactive').'</span>';
            },
        ]);
    }

    public function prepareActions()
    {
        if (bouncer()->hasPermission('blog.tag.edit')) {
            $this->addAction([
                'title'  => 'edit',
                'method' => 'GET',
                'route'  => 'admin.blog.tag.edit',
                'icon'   => 'icon-edit',
                'url'    => function ($row) {
                    return route('admin.blog.tag.edit', $row->id);
                },
            ]);
        }

        if (bouncer()->hasPermission('blog.tag.delete')) {
            $this->addAction([
                'title'  => 'delete',
                'method' => 'POST',
                'route'  => 'admin.blog.tag.delete',
                'icon'   => 'icon-delete',
                'url'    => function ($row) {
                    return route('admin.blog.tag.delete', $row->id);
                },
            ]);
        }
    }

    public function prepareMassActions()
    {
        if (bouncer()->hasPermission('blog.tag.delete')) {
            $this->addMassAction([
                'type'   => 'delete',
                'label'  => trans('admin::app.datagrid.delete'),
                'title'  => 'Delete',
                'action' => route('admin.blog.tag.massdelete'),
                'url'    => route('admin.blog.tag.massdelete'),
                'method' => 'POST',
            ]);
        }
    }
}
