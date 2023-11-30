@extends('layouts.admin')
@section('title'){{ __('View') }} {{__('Profession')}} {{ __('Details') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('View')." ".__('Profession'),'url'=>route('admin.professions.index'),'icon' => $icon??'','permission'=>'Profession-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    @include('admin.professions.show_fields')
                    <a href="{{ route('admin.professions.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
