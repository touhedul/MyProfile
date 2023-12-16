@extends('layouts.admin')
@section('title'){{ __('Update') }} {{__('Skill List')}} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Update')." ".__('Skill List'),'url'=>route('admin.skillLists.index'),'icon' => $icon??'','permission'=>'SkillList-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                   {!! Form::model($skillList, ['route' => ['admin.skillLists.update', $skillList->id], 'method' => 'patch']) !!}

                        @include('admin.skill_lists.fields')

                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

