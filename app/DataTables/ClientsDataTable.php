<?php

namespace App\DataTables;

use App\Models\Clients;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class ClientsDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'clients.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Clients $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Clients $model)
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
            'name' => new Column(['title' => __('models/clients.fields.name'), 'data' => 'name']),
            'phone' => new Column(['title' => __('models/clients.fields.phone'), 'data' => 'phone']),
            'ntn_no' => new Column(['title' => __('models/clients.fields.ntn_no'), 'data' => 'ntn_no']),
            'srtn_no' => new Column(['title' => __('models/clients.fields.srtn_no'), 'data' => 'srtn_no']),
            'address' => new Column(['title' => __('models/clients.fields.address'), 'data' => 'address']),
            'contact_person' => new Column(['title' => __('models/clients.fields.contact_person'), 'data' => 'contact_person']),
            'person_phone' => new Column(['title' => __('models/clients.fields.person_phone'), 'data' => 'person_phone']),
            'designation' => new Column(['title' => __('models/clients.fields.designation'), 'data' => 'designation'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'clients_datatable_' . time();
    }
}
