<?php

namespace App\DataTables;

use App\Models\Paymentvoucher;
use App\Models\Banks;
use App\Models\User;
use App\Models\Account;
use App\Models\JobOrder;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class PaymentvoucherDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'paymentvouchers.datatables_actions')
        ->editColumn('bank_account',function($id){
            $bank = Banks::find($id->bank_account);
            if($bank){
                return $bank->bank_name." - ". $bank->account_title;
            }
            return $id->bank_account;
        })
        ->editColumn('dabit_account',function($id){
            return optional(Account::find($id->dabit_account))->name ?? null;
        })
        ->editColumn('created_by',function($id){
            return optional(User::find($id->created_by))->name ?? null;
        })
        ->editColumn('created_at',function($id){
            return date('Y-m-d', strtotime($id->created_at));
        })
        ->editColumn('joborder_id',function($id){
            return optional(JobOrder::find($id->joborder_id))->unique_id ?? null;
        })
        ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Paymentvoucher $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Paymentvoucher $model)
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
            'joborder_id' => new Column(['title' => 'Job Order Id', 'data' => 'joborder_id']),
            'bank_account' => new Column(['title' => __('models/paymentvouchers.fields.bank_account'), 'data' => 'bank_account']),
            'dabit_account' => new Column(['title' => __('models/paymentvouchers.fields.dabit_account'), 'data' => 'dabit_account']),
            'description' => new Column(['title' => __('models/paymentvouchers.fields.description'), 'data' => 'description']),
            'amount' => new Column(['title' => __('models/paymentvouchers.fields.amount'), 'data' => 'amount']),
            'created_by' => new Column(['title' => __('models/paymentvouchers.fields.created_by'), 'data' => 'created_by'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'paymentvouchers_datatable_' . time();
    }
}
