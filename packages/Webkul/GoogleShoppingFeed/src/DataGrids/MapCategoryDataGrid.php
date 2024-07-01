<?php

namespace Webkul\GoogleShoppingFeed\DataGrids;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class MapCategoryDataGrid extends DataGrid
{
    /**
     * Primary column.
     *
     * @var string
     */
    protected $primaryColumn = 'id';

    /**
     * Prepare query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('map_google_categories as cat')
            ->select('cat.id', 'cat.category_id', 'ct.name', 'cat.google_category_path')
            ->leftJoin('category_translations as ct', function($leftJoin) {
                $leftJoin->on('cat.category_id', '=', 'ct.category_id')->where('ct.locale', app()->getLocale());
            });

        $this->addFilter('id', 'cat.id');

        return $queryBuilder;
    }

    /**
     * Prepare Columns.
     *
     * @return void
     */
    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'id',
            'label'      => trans('google_feed::app.admin.map-categories.index.datagrid.id'),
            'type'       => 'integer',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'name',
            'label'      => trans('google_feed::app.admin.map-categories.index.datagrid.store-name'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'google_category_path',
            'label'      => trans('google_feed::app.admin.map-categories.index.datagrid.google-name'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);
    }

    /**
     * Prepare mass actions.
     *
     * @return void
     */
    public function prepareMassActions()
    {
        if (bouncer()->hasPermission('google_feed.category.destroy')) {
            $this->addMassAction([
                'title'  => trans('google_feed::app.admin.map-categories.index.datagrid.delete'),
                'type'   => 'delete',
                'method' => 'POST',
                'url'    => route('google_feed.category.mass_delete'),
            ]);
        }
    }
}