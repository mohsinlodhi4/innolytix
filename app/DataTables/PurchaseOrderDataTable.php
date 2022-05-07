<?php

namespace App\DataTables;

use App\Models\PurchaseOrder;
use App\Models\Banks;
use App\Models\User;
use App\Models\Account;
use App\Models\JobOrder;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class PurchaseOrderDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'purchase_orders.datatables_actions')
        ->editColumn('created_at',function($id){
            return date('Y-m-d', strtotime($id->created_at));
        })
        ->editColumn('joborder_id',function($id){
            return optional(JobOrder::find($id->joborder_id))->unique_id ?? null;
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PurchaseOrder $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PurchaseOrder $model)
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
            'created_at' => new Column(['title' => 'Created At', 'data' => 'created_at']),
            'joborder_id' => new Column(['title' => __('models/purchaseOrders.fields.joborder_id'), 'data' => 'joborder_id']),
            'vendor_id' => new Column(['title' => __('models/purchaseOrders.fields.vendor_id'), 'data' => 'vendor_id']),
            'officedetail_id' => new Column(['title' => __('models/purchaseOrders.fields.officedetail_id'), 'data' => 'officedetail_id']),
            'reference_no' => new Column(['title' => __('models/purchaseOrders.fields.reference_no'), 'data' => 'reference_no']),
            'date' => new Column(['title' => __('models/purchaseOrders.fields.date'), 'data' => 'date']),
            'payment_terms' => new Column(['title' => __('models/purchaseOrders.fields.payment_terms'), 'data' => 'payment_terms']),
            'sub_total' => new Column(['title' => __('models/purchaseOrders.fields.sub_total'), 'data' => 'sub_total']),
            'tax' => new Column(['title' => __('models/purchaseOrders.fields.tax'), 'data' => 'tax']),
            'grand_total' => new Column(['title' => __('models/purchaseOrders.fields.grand_total'), 'data' => 'grand_total']),
            'bank_id' => new Column(['title' => __('models/purchaseOrders.fields.bank_id'), 'data' => 'bank_id'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'purchase_orders_datatable_' . time();
    }
}
