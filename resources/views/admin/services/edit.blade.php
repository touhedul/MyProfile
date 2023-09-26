@extends('layouts.admin')
@section('title'){{ __('Update') }} {{__('Service')}} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Update')." ".__('Service'),'url'=>route('admin.services.index'),'icon' => $icon??'','permission'=>'Service-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                   {!! Form::model($service, ['route' => ['admin.services.update', $service->id], 'method' => 'patch']) !!}

                        @include('admin.services.fields')

                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

