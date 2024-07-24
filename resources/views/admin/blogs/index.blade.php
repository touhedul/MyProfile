@extends('layouts.admin')
@section('title'){{ __('Blogs') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Blogs'),'url'=>route('admin.blogs.create'),'icon' => $icon??'','permission'=>'Blog-create'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.blogs.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

