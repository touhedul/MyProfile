<?php

namespace App\DataTables;

use App\Models\Contactinfo;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use App\Helpers\AdminHelper;
use Str;

class ContactinfoDataTable extends DataTable
{

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'admin.contactinfos.datatables_actions')
            ->addIndexColumn()
            ->addColumn('', '')
            ->addColumn('Sl', '')
            ->addColumn('details',function($dataTable){
                return Str::limit($dataTable->details,50);
            })

            ->addColumn('icon',function($dataTable){
                return "<i class='".$dataTable->icon."'></i>";
            })

            ->addColumn('status', 'includes.status_show')
            ->rawColumns(['details', 'action', 'icon', 'status']);
    }

    public function query(Contactinfo $model)
    {
        return $model->newQuery()->where('user_id',auth()->id());
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false,'title' => __('Action')])
            ->parameters(AdminHelper::datatableDesign("Contactinfo","Contactinfo-delete"));
    }

    protected function getColumns()
    {
        return [
            '',
            'id',
            ['data'=>'Sl','title'=>__('Sl')],
            'title',
            'details',
            'icon',
            'status'
        ];
    }

    protected function filename()
    {
        return 'contactinfos_datatable_' . time();
    }
}
