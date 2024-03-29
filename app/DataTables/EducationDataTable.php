<?php

namespace App\DataTables;

use App\Models\Education;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use App\Helpers\AdminHelper;
use Str;

class EducationDataTable extends DataTable
{

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'admin.education.datatables_actions')
            ->addIndexColumn()
            ->addColumn('', '')
            ->addColumn('Sl', '')
            ->addColumn('details',function($dataTable){
                return Str::limit($dataTable->details,50);
            })
            ->addColumn('status', 'includes.status_show')
            ->rawColumns(['details', 'action', 'image', 'status']);
    }

    public function query(Education $model)
    {
        return $model->newQuery()->where('user_id',auth()->id());
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false,'title' => __('Action')])
            ->parameters(AdminHelper::datatableDesign("Education","Education-delete"));
    }

    protected function getColumns()
    {
        return [
            '',
            'id',
            ['data'=>'Sl','title'=>__('Sl')],
            'name',
            'details',
            'status'
        ];
    }

    protected function filename()
    {
        return 'education_datatable_' . time();
    }
}
