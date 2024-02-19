<?php

namespace App\DataTables;

use App\Models\Experience;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use App\Helpers\AdminHelper;
use Str;

class ExperienceDataTable extends DataTable
{

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'admin.experiences.datatables_actions')
            ->addIndexColumn()
            ->addColumn('', '')
            ->addColumn('Sl', '')
            ->addColumn('details',function($dataTable){
                return Str::limit($dataTable->details,50);
            })
            ->addColumn('status', 'includes.status_show')
            ->rawColumns(['details', 'action', 'image', 'status']);
    }

    public function query(Experience $model)
    {
        return $model->newQuery()->where('user_id',auth()->id())->orderBy('year','desc');
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false,'title' => __('Action')])
            ->parameters(AdminHelper::datatableDesign("Experience","Experience-delete"));
    }

    protected function getColumns()
    {
        return [
            '',
            'id',
            ['data'=>'Sl','title'=>__('Sl')],
            'company',
            'role',
            'details',
            'duration',
            'year',
            'status'
        ];
    }

    protected function filename()
    {
        return 'experiences_datatable_' . time();
    }
}
