@extends('layouts.admin')
@section('title'){{__('Create')}} {{ __('Theme') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Create')." ". __('Theme'),'url'=>route('admin.themes.index'),'icon' => $icon??'','permission'=>'Theme-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    {!! Form::open(['route' => 'admin.themes.store']) !!}

                        @include('admin.themes.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

