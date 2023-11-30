@extends('layouts.admin')
@section('title'){{ __('View') }} {{__('Profession Category')}} {{ __('Details') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('View')." ".__('Profession Category'),'url'=>route('admin.professionCategories.index'),'icon' => $icon??'','permission'=>'ProfessionCategory-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    @include('admin.profession_categories.show_fields')
                    <a href="{{ route('admin.professionCategories.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
