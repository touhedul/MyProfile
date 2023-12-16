@extends('layouts.admin')
@section('title'){{ __('View') }} {{__('Skill List')}} {{ __('Details') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('View')." ".__('Skill List'),'url'=>route('admin.skillLists.index'),'icon' => $icon??'','permission'=>'SkillList-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    @include('admin.skill_lists.show_fields')
                    <a href="{{ route('admin.skillLists.index') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
