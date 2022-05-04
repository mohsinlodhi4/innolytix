<?php

namespace App\DataTables;

use App\Models\Clients;
use App\Models\User;
use App\Models\OfficeDetails;
use App\Models\Quotations;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;


class QuotationsDataTable extends DataTable
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
        // dd($dataTable);
        return $dataTable->addColumn('action', 'quotations.datatables_actions')
        ->editColumn('client_id', function($id) {
            $client=Clients::where('id',$id->client_id)->first();
            return $client->name;
        })->editColumn('officedetails_id', function($id) {
            $officedetails=OfficeDetails::where('id',$id->officedetails_id)->first();
            return $officedetails->name;
        })->editColumn('created_by', function($id) {
            $created_by=User::where('id',$id->created_by)->first();
            return $created_by->name;
        })->editColumn('tax', function($id) {
            return $id->tax . '%';
        })->editColumn('discount', function($id) {
            return $id->discount . '%';
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Quotations $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Quotations $model)
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
                       'text' => '<i class="fa fa-plus"></i> ' .__('Create').''
                    ],
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('Export').''
                    ],
                    [
                       'extend' => 'print',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-print"></i> ' .__('Print').''
                    ],
                    [
                       'extend' => 'reset',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-undo"></i> ' .__('Reset').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('Reload').''
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
            'client_id' => new Column(['title' => __('models/quotations.fields.client_id'), 'data' => 'client_id']),
            'officedetails_id' => new Column(['title' => __('models/quotations.fields.officedetails_id'), 'data' => 'officedetails_id']),
            'created_by' => new Column(['title' => __('models/quotations.fields.created_by'), 'data' => 'created_by']),
            'date' => new Column(['title' => __('models/quotations.fields.date'), 'data' => 'date']),
            'subject' => new Column(['title' => __('models/quotations.fields.subject'), 'data' => 'subject']),
            'sub_total' => new Column(['title' => __('models/quotations.fields.sub_total'), 'data' => 'sub_total']),
            'discount' => new Column(['title' => __('models/quotations.fields.discount'), 'data' => 'discount']),
            'tax' => new Column(['title' => __('models/quotations.fields.tax'), 'data' => 'tax']),
            'grand_total' => new Column(['title' => __('models/quotations.fields.grand_total'), 'data' => 'grand_total'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'quotations_datatable_' . time();
    }
}
