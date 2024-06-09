<?php

namespace Webkul\Enclaves\DataGrids;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class TransactionDataGrid extends DataGrid
{
    /**
     * Status Processing.
     *
     * @var string
     */
    const PROCESSING = 'processing';

    /**
     * Status completed.
     *
     * @var string
     */
    const COMPLETED = 'completed';

    /**
     * Status canceled.
     *
     * @var string
     */
    const CANCELED = 'canceled';
    
    /**
     * Status closed.
     *
     * @var string
     */
    const CLOSED = 'closed';
  
    /**
     * Status pending.
     *
     * @var string
     */
    const PENDING = 'pending';

    /**
     * Status pending_payment.
     *
     * @var string
     */
    const PENDING_PAYMENT = 'pending_payment';

    /**
     * Status fraud.
     *
     * @var string
     */
    const FRAUD = 'fraud';

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
                            'value'  => self::PROCESSING,
                        ],
                        [
                            'label'  => trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.completed'),
                            'value'  => self::COMPLETED,
                        ],
                        [
                            'label'  => trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.canceled'),
                            'value'  => self::CANCELED,
                        ],
                        [
                            'label'  => trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.closed'),
                            'value'  => self::CLOSED,
                        ],
                        [
                            'label'  => trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.pending'),
                            'value'  => self::PENDING,
                        ],
                        [
                            'label'  => trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.pending-payment'),
                            'value'  => self::PENDING_PAYMENT,
                        ],
                        [
                            'label'  => trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.fraud'),
                            'value'  => self::FRAUD,
                        ],
                    ],
                ],
            ],
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                switch ($row->status) {
                    case self::PROCESSING:
                        return '<span class="success">' . trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.processing') . '</span>';
                        
                        break;
                    case self::COMPLETED:
                        return '<span class="success">' . trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.completed') . '</span>';
                        
                        break;
                    case self::CANCELED:
                        return '<span class="danger">' . trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.canceled') . '</span>';
                        
                        break;
                    case self::CLOSED:
                        return '<span class="info">' . trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.closed') . '</span>';
                        
                        break;
                    case self::PENDING:
                        return '<span class="warning">' . trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.pending') . '</span>';
                        
                        break;
                    case self::PENDING_PAYMENT:
                        return '<span class="success">' . trans('enclaves::app.shop.customers.account.transactions.datagrid.status.options.pending-payment') . '</span>';
                        
                        break;
                    case self::FRAUD:
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
