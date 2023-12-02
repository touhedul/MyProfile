<?php

namespace App\DataTables;

use App\Models\Profession;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use App\Helpers\AdminHelper;
use Str;

class ProfessionDataTable extends DataTable
{

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'admin.professions.datatables_actions')
            ->addIndexColumn()
            ->addColumn('', '')
            ->addColumn('Sl', '')
            ->addColumn('category',function($dataTable){
                return $dataTable->category->name;
            })
            // ->addColumn('menus',function($dataTable){
            //     $data = $dataTable->menus->pluck('name')->implode(', ');

            //     return "<span class='badge badge-default mr-1'>$data</span>";
            // })
            ->addColumn('status', 'includes.status_show')
            ->rawColumns(['action', 'status','menus']);
    }

    public function query(Profession $model)
    {
        return $model->newQuery()->with('category','menus');
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false,'title' => __('Action')])
            ->parameters(AdminHelper::datatableDesign("Profession","Profession-delete"));
    }

    protected function getColumns()
    {
        return [
            '',
            'id',
            ['data'=>'Sl','title'=>__('Sl')],
            'name',
            'category',
            // 'menus',
            'status'
        ];
    }

    protected function filename()
    {
        return 'professions_datatable_' . time();
    }
}
