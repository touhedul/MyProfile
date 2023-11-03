@extends('layouts.admin')
@section('title'){{__('Create')}} {{ __('Achievement') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Create')." ". __('Achievement'),'url'=>route('admin.achievements.index'),'icon' => $icon??'','permission'=>'Achievement-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    {!! Form::open(['route' => 'admin.achievements.store', 'files' => true]) !!}

                        @include('admin.achievements.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

