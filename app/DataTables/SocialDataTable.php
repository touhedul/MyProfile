<?php

namespace App\DataTables;

use App\Models\Social;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use App\Helpers\AdminHelper;
use Str;

class SocialDataTable extends DataTable
{

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'admin.socials.datatables_actions')
            ->addIndexColumn()
            ->addColumn('', '')
            ->addColumn('Sl', '')
            ->addColumn('icon',function($dataTable){
                return "<i class='".$dataTable->icon."'></i>";
            })

            ->addColumn('status', 'includes.status_show')
            ->rawColumns(['status', 'action', 'icon', 'file']);
    }

    public function query(Social $model)
    {
        return $model->newQuery()->where('user_id',auth()->id());
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false,'title' => __('Action')])
            ->parameters(AdminHelper::datatableDesign("Social","Social-delete"));
    }

    protected function getColumns()
    {
        return [
            '',
            'id',
            ['data'=>'Sl','title'=>__('Sl')],
            'link',
            'icon',
            'status'
        ];
    }

    protected function filename()
    {
        return 'socials_datatable_' . time();
    }
}
