@extends('layouts.admin')
@section('title'){{ __('Projects') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Projects'),'url'=>route('admin.projects.create'),'icon' => $icon??'','permission'=>'Project-create'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.projects.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

