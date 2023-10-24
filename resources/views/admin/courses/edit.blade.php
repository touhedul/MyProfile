@extends('layouts.admin')
@section('title'){{ __('Update') }} {{__('Course')}} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Update')." ".__('Course'),'url'=>route('admin.courses.index'),'icon' => $icon??'','permission'=>'Course-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                   {!! Form::model($course, ['route' => ['admin.courses.update', $course->id], 'method' => 'patch']) !!}

                        @include('admin.courses.fields')

                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

