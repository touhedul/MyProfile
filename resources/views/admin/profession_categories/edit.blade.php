@extends('layouts.admin')
@section('title'){{ __('Update') }} {{__('Profession Category')}} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Update')." ".__('Profession Category'),'url'=>route('admin.professionCategories.index'),'icon' => $icon??'','permission'=>'ProfessionCategory-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                   {!! Form::model($professionCategory, ['route' => ['admin.professionCategories.update', $professionCategory->id], 'method' => 'patch']) !!}

                        @include('admin.profession_categories.fields')

                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

