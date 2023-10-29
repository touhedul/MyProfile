@extends('layouts.admin')
@section('title'){{ __('Update') }} {{__('Experience')}} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Update')." ".__('Experience'),'url'=>route('admin.experiences.index'),'icon' => $icon??'','permission'=>'Experience-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                   {!! Form::model($experience, ['route' => ['admin.experiences.update', $experience->id], 'method' => 'patch']) !!}

                        @include('admin.experiences.fields')

                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

