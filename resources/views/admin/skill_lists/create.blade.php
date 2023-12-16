@extends('layouts.admin')
@section('title'){{__('Create')}} {{ __('Skill List') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Create')." ". __('Skill List'),'url'=>route('admin.skillLists.index'),'icon' => $icon??'','permission'=>'SkillList-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    {!! Form::open(['route' => 'admin.skillLists.store']) !!}

                        @include('admin.skill_lists.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

