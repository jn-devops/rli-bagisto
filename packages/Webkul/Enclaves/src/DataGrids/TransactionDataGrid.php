<?php

namespace Webkul\Enclaves\DataGrids;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class TransactionDataGrid extends DataGrid
{
    /**
     * Prepare query builder.
     *
     * @return void
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('orders')
            ->addSelect(
                'orders.id',
                'orders.increment_id',
                'orders.status',
                'orders.created_at',
                'orders.grand_total',
                'orders.order_currency_code',
                'order_items.name as product_name',
                'order_items.sku as sku',
                'orders.processing_fee as reservation_fee',
            )
            ->leftJoin('order_items', 'order_items.order_id', 'orders.id')
            ->where('customer_id', auth()->guard('customer')->user()->id)
            ->groupBy('orders.id');

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
            'index'      => 'increment_id',
            'label'      => trans('enclaves::app.shop.customers.account.transactions.datagrid.transaction-no'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'product_name',
            'label'      => trans('enclaves::app.shop.customers.account.transactions.datagrid.property'),
            'type'       => 'date_range',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                return '<a href="" class="link">' . $row->product_name . '</a>';
            },
        ]);

        $this->addColumn([
            'index'      => 'sku',
            'label'      => trans('enclaves::app.shop.customers.account.transactions.datagrid.sku'),
            'type'       => 'integer',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'grand_total',
            'label'      => trans('enclaves::app.shop.customers.account.transactions.datagrid.contract'),
            'type'       => 'integer',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                return core()->formatPrice($row->grand_total, $row->order_currency_code);
            },
        ]);

        $this->addColumn([
            'index'      => 'reservation_fee',
            'label'      => trans('enclaves::app.shop.customers.account.transactions.datagrid.reservation'),
            'type'       => 'integer',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                return core()->formatPrice($row->reservation_fee);
            },
        ]);

        $this->addColumn([
            'index'      => 'status',
            'label'      => trans('enclaves::app.shop.customers.account.transactions.datagrid.status.title'),
            'type'       => 'dropdown',
            'options'    => [
                'type'   => 'basic',
                'params' => [
                    'options' => [
                        [
                            'label'  => trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.processing'),
                            'value'  => 'processing',
                        ],
                        [
                            'label'  => trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.completed'),
                            'value'  => 'completed',
                        ],
                        [
                            'label'  => trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.canceled'),
                            'value'  => 'canceled',
                        ],
                        [
                            'label'  => trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.closed'),
                            'value'  => 'closed',
                        ],
                        [
                            'label'  => trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.pending'),
                            'value'  => 'pending',
                        ],
                        [
                            'label'  => trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.pending-payment'),
                            'value'  => 'pending_payment',
                        ],
                        [
                            'label'  => trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.fraud'),
                            'value'  => 'fraud',
                        ],
                    ],
                ],
            ],
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                switch ($row->status) {
                    case 'processing':
                        return '<span class="success">' . trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.processing') . '</span>';
                        break;

                    case 'completed':
                        return '<span class="success">' . trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.completed') . '</span>';
                        break;

                    case 'canceled':
                        return '<span class="danger">' . trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.canceled') . '</span>';
                        break;

                    case 'closed':
                        return '<span class="info">' . trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.closed') . '</span>';
                        break;

                    case 'pending':
                        return '<span class="warning">' . trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.pending') . '</span>';
                        break;

                    case 'pending_payment':
                        return '<span class="success">' . trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.pending-payment') . '</span>';
                        break;

                    case 'fraud':
                        return '<span class="danger">' . trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.fraud') . '</span>';
                        break;
                }
            },
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
            'icon'   => 'icon-eye',
            'title'  => trans('ui::app.datagrid.view'),
            'method' => 'GET',
            'url'    => function ($row) {
                return route('shop.customers.account.transactions.view', $row->id);
            },
        ]);
    }
}
