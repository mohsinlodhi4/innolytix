<?php

namespace App\DataTables;

use App\Models\Banks;
use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class BanksDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'banks.datatables_actions')->editColumn('created_by',function($data){
            return User::find($data->created_by)->name ?? '';
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Banks $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Banks $model)
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
            'bank_name' => new Column(['title' => __('models/banks.fields.bank_name'), 'data' => 'bank_name']),
            'branch' => new Column(['title' => __('models/banks.fields.branch'), 'data' => 'branch']),
            'account_title' => new Column(['title' => __('models/banks.fields.account_title'), 'data' => 'account_title']),
            'account_no' => new Column(['title' => __('models/banks.fields.account_no'), 'data' => 'account_no']),
            'iban' => new Column(['title' => __('models/banks.fields.iban'), 'data' => 'iban']),
            'opening_balance' => new Column(['title' => __('models/banks.fields.opening_balance'), 'data' => 'opening_balance']),
            'created_by' => new Column(['title' => __('models/banks.fields.created_by'), 'data' => 'created_by'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'banks_datatable_' . time();
    }
}
