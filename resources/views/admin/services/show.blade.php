@extends('layouts.admin')
@section('title'){{ __('View') }} {{__('Service')}} {{ __('Details') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('View')." ".__('Service'),'url'=>route('admin.services.index'),'icon' => $icon??'','permission'=>'Service-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    @include('admin.services.show_fields')
                    <a href="{{ route('admin.services.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
