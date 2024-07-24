@extends('layouts.admin')
@section('title'){{ __('View') }} {{__('Blog')}} {{ __('Details') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('View')." ".__('Blog'),'url'=>route('admin.blogs.index'),'icon' => $icon??'','permission'=>'Blog-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    @include('admin.blogs.show_fields')
                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
