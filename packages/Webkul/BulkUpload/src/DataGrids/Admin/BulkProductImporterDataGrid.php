<?php

namespace Webkul\BulkUpload\DataGrids\Admin;

use DB;
use Webkul\DataGrid\DataGrid;

class BulkProductImporterDataGrid extends DataGrid
{
    /**
     * @var integer
     */
    protected $index = 'id';

    /**
     * Sort order.
     *
     * @var string
     */
    protected $sortOrder = 'desc';

    /**
     * Items per page.
     *
     * @var int
     */
    protected $itemsPerPage = 10;

    /**
     * Prepare query builder.
     *
     * @return void
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('bulk_product_importers')
            ->leftJoin('attribute_families', 'bulk_product_importers.attribute_family_id', '=', 'attribute_families.id')
            ->select(
                'bulk_product_importers.id',
                'bulk_product_importers.name as profile_name',
                'attribute_families.name',
                'bulk_product_importers.locale_code',
                'bulk_product_importers.created_at'
            );

        $this->addFilter('created_at', 'bulk_product_importers.created_at');
        $this->addFilter('profile_name', 'bulk_product_importers.name');
        $this->addFilter('name', 'attribute_families.name');
            
        return $queryBuilder;
    }

    /**
     * Add columns.
     *
     * @return void
     */
    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'profile_name',
            'label'      => trans('bulkupload::app.admin.bulk-upload.bulk-product-importer.name'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index'      => 'name',
            'label'      => trans('bulkupload::app.admin.bulk-upload.bulk-product-importer.family'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index'      => 'locale_code',
            'label'      => trans('bulkupload::app.admin.bulk-upload.bulk-product-importer.data-grid.locale_code'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index'      => 'created_at',
            'label'      => trans('bulkupload::app.admin.bulk-upload.bulk-product-importer.data-grid.created-at'),
            'type'       => 'datetime',
            'sortable'   => true,
            'searchable' => true,
            'filterable' => true
        ]);
    }

    /**
     * Prepare actions.
     *
     * @return void
     */
    public function prepareActions()
    {
        $this->addAction([
            'title'  => trans('admin::app.datagrid.edit'),
            'method' => 'GET',
            'url'    => function ($row) {
                return route('admin.bulk-upload.bulk-product-importer.edit', $row->id);
            },
            'icon'   => 'icon icon-edit',
        ]);

        $this->addAction([
            'title'        => trans('admin::app.datagrid.delete'),
            'method'       => 'POST',
            'url'          => function ($row) {
                return route('admin.bulk-upload.bulk-product-importer.delete', $row->id);
            },
            'confirm_text' => trans('ui::app.datagrid.mass-action.delete', ['resource' => 'address']),
            'icon'         => 'icon icon-delete',
        ]);
    }

    /**
     * Prepare mass actions.
     *
     * @return void
     */
    public function prepareMassActions()
    {
        $this->addMassAction([
            'type'   => 'delete',
            'label'  => 'Delete',
            'url'    => route('admin.bulk-upload.bulk-product-importer.massDelete'),
            'method' => 'POST',
            'title'  => 'Delete'
        ]);
    }
}
