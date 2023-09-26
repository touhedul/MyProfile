@extends('layouts.admin')
@section('title'){{__('Create')}} {{ __('Service') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Create')." ". __('Service'),'url'=>route('admin.services.index'),'icon' => $icon??'','permission'=>'Service-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    {!! Form::open(['route' => 'admin.services.store']) !!}

                        @include('admin.services.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

