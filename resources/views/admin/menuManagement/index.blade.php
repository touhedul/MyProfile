@extends('layouts.admin')
@section('title'){{ __('Menus') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Menu Management'),'url'=>'','icon' => $icon??'','permission'=>''])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                Menu management
                    {{-- @include('admin.menus.table') --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

