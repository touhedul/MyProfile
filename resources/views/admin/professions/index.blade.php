@extends('layouts.admin')
@section('title'){{ __('Professions') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Professions'),'url'=>route('admin.professions.create'),'icon' => $icon??'','permission'=>'Profession-create'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.professions.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

