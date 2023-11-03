@extends('layouts.admin')
@section('title'){{ __('Update') }} {{__('Achievement')}} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Update')." ".__('Achievement'),'url'=>route('admin.achievements.index'),'icon' => $icon??'','permission'=>'Achievement-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                   {!! Form::model($achievement, ['route' => ['admin.achievements.update', $achievement->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('admin.achievements.fields')

                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

