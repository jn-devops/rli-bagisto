<?php

namespace Webkul\Enclaves\DataGrids;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class InquiriesDataGrid extends DataGrid
{
    /**
     * Primary column.
     *
     * @var string
     */
    protected $primaryColumn = 'ticket_id';

    /**
     * Prepare query builder.
     *
     * @return void
     */
    public function prepareQueryBuilder()
    {
        $tablePrefix = DB::getTablePrefix();

        $queryBuilder = DB::table('tickets')
            ->addSelect(
                'tickets.id as ticket_id',
                DB::raw('CONCAT(' . $tablePrefix . "customers.first_name, ' ', " . $tablePrefix . 'customers.last_name) as full_name'),
                'ticket_reasons.name as reasons_name',
                'ticket_status.name as status',
                'tickets.comment',
                'tickets.created_at as created_at',
            )
            ->leftJoin('ticket_files', 'ticket_files.ticket_id', 'tickets.id')
            ->leftJoin('customers', 'customers.id', 'tickets.customer_id')
            ->leftJoin('ticket_reasons', 'ticket_reasons.id', 'tickets.ticket_reason_id')
            ->leftJoin('ticket_status', 'ticket_status.id', 'tickets.ticket_status_id');

        $this->addFilter('ticket_id', 'tickets.id');
        $this->addFilter('full_name', DB::raw('CONCAT(' . DB::getTablePrefix() . 'customers.first_name, " ", ' . DB::getTablePrefix() . 'customers.last_name)'));
        $this->addFilter('reasons_name', 'ticket_reasons.name');
        $this->addFilter('status', 'ticket_status.name');
        $this->addFilter('created_at', 'tickets.created_at');

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
            'index'      => 'ticket_id',
            'label'      => trans('enclaves::app.admin.inquiries.datagrid.header.id'),
            'type'       => 'integer',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                return $row->ticket_id;
            },
        ]);

        $this->addColumn([
            'index'      => 'full_name',
            'label'      => trans('enclaves::app.admin.inquiries.datagrid.header.customer-name'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'reasons_name',
            'label'      => trans('enclaves::app.admin.inquiries.datagrid.header.reason'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'comment',
            'label'      => trans('enclaves::app.admin.inquiries.datagrid.header.comment'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                $comment = trim(strip_tags(html_entity_decode($row->comment)));

                return strlen($comment) > 14 ? substr($comment, 0, 14) . '..' : $comment;
            },
        ]);

        $this->addColumn([
            'index'      => 'status',
            'label'      => trans('enclaves::app.admin.inquiries.datagrid.header.status'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                switch ($row->status) {
                    case 'Resolved':
                        return '<span class="label-active p-1">' . $row->status . '</span>';

                        break;

                    case 'Pending':
                        return '<span class="label-pending p-1">' . $row->status . '</span>';

                        break;
                    case 'Canceled':
                        return '<span class="label-danger p-1">' . $row->status . '</span>';
                        break;
                }
            },
        ]);

        $this->addColumn([
            'index'      => 'created_at',
            'label'      => trans('enclaves::app.admin.inquiries.datagrid.header.created-at'),
            'type'       => 'date_range',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
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
            'icon'   => 'icon-edit',
            'title'  => trans('ui::app.datagrid.view'),
            'method' => 'GET',
            'url'    => function ($row) {
                return route('enclaves.admin.inquiries.view', $row->ticket_id);
            },
        ]);

        $this->addAction([
            'icon'   => 'icon-delete',
            'title'  => trans('ui::app.datagrid.view'),
            'method' => 'GET',
            'url'    => function ($row) {
                return route('enclaves.admin.inquiries.destroy', $row->ticket_id);
            },
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
            'icon'   => 'icon-delete',
            'title'  => trans('delete'),
            'method' => 'POST',
            'url'    => route('enclaves.admin.inquiries.mass-destroy'),
        ]);
    }
}
