@extends('layouts.admin')
@section('title'){{__('Create')}} {{ __('Menu') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Create')." ". __('Menu'),'url'=>route('admin.menus.index'),'icon' => $icon??'','permission'=>'Menu-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    {!! Form::open(['route' => 'admin.menus.store']) !!}

                        @include('admin.menus.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

