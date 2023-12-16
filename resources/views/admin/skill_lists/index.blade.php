@extends('layouts.admin')
@section('title'){{ __('Skill Lists') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Skill Lists'),'url'=>route('admin.skillLists.create'),'icon' => $icon??'','permission'=>'SkillList-create'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.skill_lists.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

