<?php

namespace App\DataTables;

use App\Models\Client;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use App\Helpers\AdminHelper;
use Str;

class ClientDataTable extends DataTable
{

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'admin.clients.datatables_actions')
            ->addIndexColumn()
            ->addColumn('', '')
            ->addColumn('Sl', '')
            ->addColumn('image', function ($dataTable) {
                $image = $dataTable->image ? asset('images/'.$dataTable->image) : defaultImage('client_image');
                return "<img width='100px' height='80px' src='".$image."'/>";
            })
            ->addColumn('status', 'includes.status_show')
            ->rawColumns(['details', 'action', 'image', 'status']);
    }

    public function query(Client $model)
    {
        return $model->newQuery()->where('user_id',auth()->id());
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false,'title' => __('Action')])
            ->parameters(AdminHelper::datatableDesign("Client","Client-delete"));
    }

    protected function getColumns()
    {
        return [
            '',
            'id',
            ['data'=>'Sl','title'=>__('Sl')],
            'image',
            'status'
        ];
    }

    protected function filename()
    {
        return 'clients_datatable_' . time();
    }
}
