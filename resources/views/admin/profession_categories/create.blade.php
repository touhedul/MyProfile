@extends('layouts.admin')
@section('title'){{__('Create')}} {{ __('Profession Category') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Create')." ". __('Profession Category'),'url'=>route('admin.professionCategories.index'),'icon' => $icon??'','permission'=>'ProfessionCategory-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    {!! Form::open(['route' => 'admin.professionCategories.store']) !!}

                        @include('admin.profession_categories.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

