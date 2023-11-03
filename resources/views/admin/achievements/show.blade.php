@extends('layouts.admin')
@section('title'){{ __('View') }} {{__('Achievement')}} {{ __('Details') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('View')." ".__('Achievement'),'url'=>route('admin.achievements.index'),'icon' => $icon??'','permission'=>'Achievement-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    @include('admin.achievements.show_fields')
                    <a href="{{ route('admin.achievements.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
