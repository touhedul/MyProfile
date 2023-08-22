@extends('layouts.admin')
@section('title'){{ __('View') }} {{__('Theme')}} {{ __('Details') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('View')." ".__('Theme'),'url'=>route('admin.themes.index'),'icon' => $icon??'','permission'=>'Theme-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    @include('admin.themes.show_fields')
                    <a href="{{ route('admin.themes.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
