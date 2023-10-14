@extends('layouts.admin')
@section('title'){{ __('Update') }} {{__('Skill')}} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Update')." ".__('Skill'),'url'=>route('admin.skills.index'),'icon' => $icon??'','permission'=>'Skill-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                   {!! Form::model($skill, ['route' => ['admin.skills.update', $skill->id], 'method' => 'patch']) !!}

                        @include('admin.skills.fields')

                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

