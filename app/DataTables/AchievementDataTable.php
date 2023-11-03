<?php

namespace App\DataTables;

use App\Models\Achievement;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use App\Helpers\AdminHelper;
use Str;

class AchievementDataTable extends DataTable
{

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'admin.achievements.datatables_actions')
            ->addIndexColumn()
            ->addColumn('', '')
            ->addColumn('Sl', '')
            ->addColumn('details',function($dataTable){
                return Str::limit($dataTable->details,50);
            })
            ->addColumn('image', function ($dataTable) {
                $image = $dataTable->image ? asset('images/'.$dataTable->image) : defaultImage('no_image') ;
                return "<img width='auto' height='80px' src='{$image}'/>";
            })

            ->addColumn('status', 'includes.status_show')
            ->rawColumns(['details', 'action', 'image', 'status']);
    }

    public function query(Achievement $model)
    {
        return $model->newQuery()->where('user_id',auth()->id());
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false,'title' => __('Action')])
            ->parameters(AdminHelper::datatableDesign("Achievement","Achievement-delete"));
    }

    protected function getColumns()
    {
        return [
            '',
            'id',
            ['data'=>'Sl','title'=>__('Sl')],
            'title',
            'details',
            'image',
            'status'
        ];
    }

    protected function filename()
    {
        return 'achievements_datatable_' . time();
    }
}
