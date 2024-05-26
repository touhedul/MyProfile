@extends('layouts.admin')
@section('title'){{__('Create')}} {{ __('Custom Domain') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Create')." ". __('Custom Domain'),'url'=>route('admin.customDomains.index'),'icon' => $icon??'','permission'=>'CustomDomain-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    {!! Form::open(['route' => 'admin.customDomains.store']) !!}

                        @include('admin.custom_domains.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

