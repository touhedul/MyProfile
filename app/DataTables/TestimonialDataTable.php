<?php

namespace App\DataTables;

use App\Models\Testimonial;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use App\Helpers\AdminHelper;
use Str;

class TestimonialDataTable extends DataTable
{

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'admin.testimonials.datatables_actions')
            ->addIndexColumn()
            ->addColumn('', '')
            ->addColumn('Sl', '')
            ->addColumn('message',function($dataTable){
                return Str::limit($dataTable->message,50);
            })
            // ->addColumn('image', function ($dataTable) {
            //     $image = $dataTable->image ? asset('images/'.$dataTable->image) : defaultImage('no_image') ;
            //     return "<img width='auto' height='80px' src='{$image}'/>";
            // })

            ->addColumn('status', 'includes.status_show')
            ->rawColumns(['message', 'action', 'image', 'status']);
    }

    public function query(Testimonial $model)
    {
        return $model->newQuery()->where('user_id',auth()->id());
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false,'title' => __('Action')])
            ->parameters(AdminHelper::datatableDesign("Testimonial","Testimonial-delete"));
    }

    protected function getColumns()
    {
        return [
            '',
            'id',
            ['data'=>'Sl','title'=>__('Sl')],
            'name',
            'designation',
            'message',
            // 'image',
            'status'
        ];
    }

    protected function filename()
    {
        return 'testimonials_datatable_' . time();
    }
}
