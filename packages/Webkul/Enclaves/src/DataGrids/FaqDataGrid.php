<?php

namespace Webkul\Enclaves\DataGrids;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class FaqDataGrid extends DataGrid
{
    /**
     * Active in string
     */
    const ACTIVE = 'Active';

    /**
     * Inactive in string
     */
    const INACTIVE = 'Inactive';

    /**
     * Prepare query builder.
     *
     * @return void
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('ticket_faqs')
            ->addSelect(
                'ticket_faqs.id as id',
                'ticket_faqs.question as question',
                'ticket_faqs.answer as answer',
                'ticket_faqs.status as status',
                'ticket_faqs.created_at as created_at',
            );

        $this->addFilter('id', 'ticket_faqs.id');
        $this->addFilter('question', 'ticket_faqs.question');
        $this->addFilter('answer', 'ticket_faqs.answer');
        $this->addFilter('created_at', 'ticket_faqs.created_at');

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
            'index'      => 'id',
            'label'      => trans('enclaves::app.admin.inquiries.faq.datagrid.id'),
            'type'       => 'integer',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'question',
            'label'      => trans('enclaves::app.admin.inquiries.faq.datagrid.question'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'answer',
            'label'      => trans('enclaves::app.admin.inquiries.faq.datagrid.answer'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'status',
            'label'      => trans('enclaves::app.admin.inquiries.faq.datagrid.status'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
            'closure'    => function ($row) {
                if($row->status) {
                    return '<span class="label-active p-1">' . self::ACTIVE . '</span>';
                }

                return '<span class="label-info p-1">' . self::INACTIVE . '</span>';
            },
        ]);

        $this->addColumn([
            'index'      => 'created_at',
            'label'      => trans('enclaves::app.admin.inquiries.faq.datagrid.created_at'),
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
            'title'  => 'Edit',
            'method' => 'GET',
            'icon'   => 'icon icon-edit',
            'url'    => function ($row) {
                return route('enclaves.admin.inquiries.faq.edit', $row->id);
            },
        ]);

        $this->addAction([
            'icon'   => 'icon-delete',
            'title'  => 'Delete',
            'method' => 'POST',
            'url'    => function ($row) {
                return route('enclaves.admin.inquiries.faq.destroy', $row->id);
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
            'url'    => route('enclaves.admin.inquiries.faq.mass-destroy'),
        ]);
    }
}