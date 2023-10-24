@extends('layouts.admin')
@section('title'){{__('Create')}} {{ __('Course') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Create')." ". __('Course'),'url'=>route('admin.courses.index'),'icon' => $icon??'','permission'=>'Course-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    {!! Form::open(['route' => 'admin.courses.store']) !!}

                        @include('admin.courses.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

