<?php

namespace App\DataTables;

use App\Models\Invoices;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class InvoicesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'invoices.datatables_actions')
        ->editColumn('joborder_id', function($id){
            return JobOrder::find($id)->unique_id;
        })
        ->editColumn('created_at', function($date){
            return $date->toDateString();
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Invoices $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Invoices $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                       'extend' => 'create',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    ],
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                    [
                       'extend' => 'print',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print').''
                    ],
                    [
                       'extend' => 'reset',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-undo"></i> ' .__('auth.app.reset').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('auth.app.reload').''
                    ],
                ],
                 'language' => [
                   'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/English.json'),
                 ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'date' => new Column(['title' => __('models/invoices.fields.date'), 'data' => 'date']),
            'subject' => new Column(['title' => __('models/invoices.fields.subject'), 'data' => 'subject']),
            'joborder_id' => new Column(['title' => 'Joborder', 'data' => 'joborder_id']),
            'officedetails_id' => new Column(['title' => __('models/invoices.fields.officedetails_id'), 'data' => 'officedetails_id']),
            'sub_total' => new Column(['title' => __('models/invoices.fields.sub_total'), 'data' => 'sub_total']),
            'discount' => new Column(['title' => __('models/invoices.fields.discount'), 'data' => 'discount']),
            'tax' => new Column(['title' => __('models/invoices.fields.tax'), 'data' => 'tax']),
            'grand_total' => new Column(['title' => __('models/invoices.fields.grand_total'), 'data' => 'grand_total']),
            'bank_id' => new Column(['title' => __('models/invoices.fields.bank_id'), 'data' => 'bank_id']),
            'created_by' => new Column(['title' => __('models/invoices.fields.created_by'), 'data' => 'created_by']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'invoices_datatable_' . time();
    }
}
