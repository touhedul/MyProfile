@extends('layouts.admin')
@section('title'){{ __('Themes') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Themes'),'url'=>route('admin.themes.create'),'icon' => $icon??'','permission'=>'Theme-create'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.themes.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

