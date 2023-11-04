@extends('layouts.admin')
@section('title'){{ __('Update') }} {{__('Education')}} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Update')." ".__('Education'),'url'=>route('admin.education.index'),'icon' => $icon??'','permission'=>'Education-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                   {!! Form::model($education, ['route' => ['admin.education.update', $education->id], 'method' => 'patch']) !!}

                        @include('admin.education.fields')

                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

