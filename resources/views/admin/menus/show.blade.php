@extends('layouts.admin')
@section('title'){{ __('View') }} {{__('Menu')}} {{ __('Details') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('View')." ".__('Menu'),'url'=>route('admin.menus.index'),'icon' => $icon??'','permission'=>'Menu-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    @include('admin.menus.show_fields')
                    <a href="{{ route('admin.menus.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
