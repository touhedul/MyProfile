@extends('layouts.admin')
@section('title'){{__('Create')}} {{ __('Skill') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Create')." ". __('Skill'),'url'=>route('admin.skills.index'),'icon' => $icon??'','permission'=>'Skill-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    {!! Form::open(['route' => 'admin.skills.store']) !!}

                        @include('admin.skills.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

