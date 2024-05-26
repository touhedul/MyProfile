@extends('layouts.admin')
@section('title'){{ __('Custom Domains') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Custom Domains'),'url'=>route('admin.customDomains.create'),'icon' => $icon??'','permission'=>'CustomDomain-create'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.custom_domains.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

