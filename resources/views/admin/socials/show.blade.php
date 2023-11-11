@extends('layouts.admin')
@section('title'){{ __('View') }} {{__('Social')}} {{ __('Details') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('View')." ".__('Social'),'url'=>route('admin.socials.index'),'icon' => $icon??'','permission'=>'Social-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    @include('admin.socials.show_fields')
                    <a href="{{ route('admin.socials.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
