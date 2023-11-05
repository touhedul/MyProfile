@extends('layouts.admin')
@section('title'){{__('Create')}} {{ __('Client') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Create')." ". __('Client'),'url'=>route('admin.clients.index'),'icon' => $icon??'','permission'=>'Client-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    {!! Form::open(['route' => 'admin.clients.store', 'files' => true]) !!}

                        @include('admin.clients.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

