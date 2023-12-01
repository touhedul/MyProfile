<?php

namespace App\DataTables;

use App\Models\Menu;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use App\Helpers\AdminHelper;
use Str;

class MenuDataTable extends DataTable
{

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'admin.menus.datatables_actions')
            ->addIndexColumn()
            ->addColumn('', '')
            ->addColumn('Sl', '')
            ->addColumn('status', 'includes.status_show')
            ->rawColumns(['details', 'action', 'image', 'status']);
    }

    public function query(Menu $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false,'title' => __('Action')])
            ->parameters(AdminHelper::datatableDesign("Menu","Menu-delete"));
    }

    protected function getColumns()
    {
        return [
            '',
            'id',
            ['data'=>'Sl','title'=>__('Sl')],
            'name',
            'status'
        ];
    }

    protected function filename()
    {
        return 'menus_datatable_' . time();
    }
}
