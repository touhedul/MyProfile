@extends('layouts.admin')
@section('title'){{ __('View') }} {{__('Custom Domain')}} {{ __('Details') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('View')." ".__('Custom Domain'),'url'=>route('admin.customDomains.index'),'icon' => $icon??'','permission'=>'CustomDomain-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    @include('admin.custom_domains.show_fields')
                    <a href="{{ route('admin.customDomains.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
