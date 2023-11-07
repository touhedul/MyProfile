@extends('layouts.admin')
@section('title'){{ __('View') }} {{__('Contactinfo')}} {{ __('Details') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('View')." ".__('Contactinfo'),'url'=>route('admin.contactinfos.index'),'icon' => $icon??'','permission'=>'Contactinfo-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    @include('admin.contactinfos.show_fields')
                    <a href="{{ route('admin.contactinfos.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
