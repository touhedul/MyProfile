@extends('layouts.admin')
@section('title'){{ __('Clients') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Clients'),'url'=>route('admin.clients.create'),'icon' => $icon??'','permission'=>'Client-create'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.clients.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

