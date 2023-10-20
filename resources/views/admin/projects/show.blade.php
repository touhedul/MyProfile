@extends('layouts.admin')
@section('title'){{ __('View') }} {{__('Project')}} {{ __('Details') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('View')." ".__('Project'),'url'=>route('admin.projects.index'),'icon' => $icon??'','permission'=>'Project-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    @include('admin.projects.show_fields')
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
