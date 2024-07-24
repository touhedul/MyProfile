@extends('layouts.admin')
@section('title'){{__('Create')}} {{ __('Blog') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Create')." ". __('Blog'),'url'=>route('admin.blogs.index'),'icon' => $icon??'','permission'=>'Blog-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    {!! Form::open(['route' => 'admin.blogs.store', 'files' => true]) !!}

                        @include('admin.blogs.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

