<?php

namespace App\DataTables;

use App\Models\Service;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use App\Helpers\AdminHelper;
use Str;

class ServiceDataTable extends DataTable
{

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'admin.services.datatables_actions')
            ->addIndexColumn()
            ->addColumn('', '')
            ->addColumn('Sl', '')
            ->addColumn('description',function($dataTable){
                return Str::limit($dataTable->description,50);
            })
            ->addColumn('icon',function($dataTable){
                return "<i class='".$dataTable->icon."'></i>";
            })
            ->addColumn('status', function ($dataTable) {
                $active = '<div class="mb-2 mr-2 badge badge-success">'.__('Active').'</div>';
                $deactive = '<div class="mb-2 mr-2 badge badge-danger">'.__('Deactive').'</div>';
                return $dataTable->status == 1 ? $active : $deactive;
            })
            // ->addColumn('image', function ($dataTable) {
            //     return "<img width='100px' height='80px' src='".asset('images/'.$dataTable->image)."'/>";
            // })
            // ->addColumn('file',function($dataTable){
            //     return "<a download href='".asset('files/'. $dataTable->file)."'>Download</a>";
            // })
            ->rawColumns(['description', 'action', 'icon', 'status']);

    }

    public function query(Service $model)
    {
        return $model->newQuery()->where('user_id',auth()->id());
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false,'title' => __('Action')])
            ->parameters(AdminHelper::datatableDesign("Service","Service-delete"));
    }

    protected function getColumns()
    {
        return [
            '',
            'id',
            ['data'=>'Sl','title'=>__('Sl')],
            'title',
            'description',
            'icon',
            'status'
        ];
    }

    protected function filename()
    {
        return 'services_datatable_' . time();
    }
}
