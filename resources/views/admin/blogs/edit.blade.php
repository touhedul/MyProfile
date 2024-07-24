@extends('layouts.admin')
@section('title'){{ __('Update') }} {{__('Blog')}} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Update')." ".__('Blog'),'url'=>route('admin.blogs.index'),'icon' => $icon??'','permission'=>'Blog-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                   {!! Form::model($blog, ['route' => ['admin.blogs.update', $blog->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('admin.blogs.fields')

                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

