<?php

namespace App\DataTables;

use App\Models\CustomDomain;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use App\Helpers\AdminHelper;
use Str;

class CustomDomainDataTable extends DataTable
{

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'admin.custom_domains.datatables_actions')
            ->addIndexColumn()
            ->addColumn('', '')
            ->addColumn('Sl', '')
            ->addColumn('user', function ($dataTable) {
                return $dataTable->user?->name . " (" . $dataTable->user->email . ")";
            })
            ->addColumn('is_sub_domain', function ($dataTable) {
                if ($dataTable->is_sub_domain) {
                    return '<div class="mb-2 mr-2 badge badge-success">' . __('Active') . '</div>';
                } else {
                    return '<div class="mb-2 mr-2 badge badge-danger">' . __('Deactive') . '</div>';
                }
            })
            ->addColumn('status', 'includes.status_show')
            ->rawColumns(['details', 'action', 'image', 'file']);
    }

    public function query(CustomDomain $model)
    {
        return $model->newQuery()->with('user');
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('Action')])
            ->parameters(AdminHelper::datatableDesign("CustomDomain", "CustomDomain-delete"));
    }

    protected function getColumns()
    {
        return [
            '',
            'id',
            ['data' => 'Sl', 'title' => __('Sl')],
            'user',
            'domain',
            'status',
            'is_sub_domain'
        ];
    }

    protected function filename()
    {
        return 'custom_domains_datatable_' . time();
    }
}
