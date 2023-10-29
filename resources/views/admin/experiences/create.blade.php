@extends('layouts.admin')
@section('title'){{__('Create')}} {{ __('Experience') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Create')." ". __('Experience'),'url'=>route('admin.experiences.index'),'icon' => $icon??'','permission'=>'Experience-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    {!! Form::open(['route' => 'admin.experiences.store']) !!}

                        @include('admin.experiences.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

