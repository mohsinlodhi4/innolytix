<?php

namespace App\DataTables;

use App\Models\InvoicesProducts;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class InvoicesProductsDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'invoices_products.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\InvoicesProducts $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(InvoicesProducts $model)
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
            'name' => new Column(['title' => __('models/invoicesProducts.fields.name'), 'data' => 'name']),
            'description' => new Column(['title' => __('models/invoicesProducts.fields.description'), 'data' => 'description']),
            'model_no' => new Column(['title' => __('models/invoicesProducts.fields.model_no'), 'data' => 'model_no']),
            'brand' => new Column(['title' => __('models/invoicesProducts.fields.brand'), 'data' => 'brand']),
            'unitprice' => new Column(['title' => __('models/invoicesProducts.fields.unitprice'), 'data' => 'unitprice']),
            'qty' => new Column(['title' => __('models/invoicesProducts.fields.qty'), 'data' => 'qty']),
            'total' => new Column(['title' => __('models/invoicesProducts.fields.total'), 'data' => 'total']),
            'vendor_id' => new Column(['title' => __('models/invoicesProducts.fields.vendor_id'), 'data' => 'vendor_id']),
            'invoice_id' => new Column(['title' => __('models/invoicesProducts.fields.invoice_id'), 'data' => 'invoice_id'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'invoices_products_datatable_' . time();
    }
}
