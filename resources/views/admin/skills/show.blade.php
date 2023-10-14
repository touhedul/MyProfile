@extends('layouts.admin')
@section('title'){{ __('View') }} {{__('Skill')}} {{ __('Details') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('View')." ".__('Skill'),'url'=>route('admin.skills.index'),'icon' => $icon??'','permission'=>'Skill-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    @include('admin.skills.show_fields')
                    <a href="{{ route('admin.skills.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
