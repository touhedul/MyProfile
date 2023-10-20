@extends('layouts.admin')
@section('title'){{ __('Update') }} {{__('Project')}} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Update')." ".__('Project'),'url'=>route('admin.projects.index'),'icon' => $icon??'','permission'=>'Project-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                   {!! Form::model($project, ['route' => ['admin.projects.update', $project->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('admin.projects.fields')

                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

