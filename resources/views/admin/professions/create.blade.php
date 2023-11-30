@extends('layouts.admin')
@section('title'){{__('Create')}} {{ __('Profession') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Create')." ". __('Profession'),'url'=>route('admin.professions.index'),'icon' => $icon??'','permission'=>'Profession-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    {!! Form::open(['route' => 'admin.professions.store']) !!}

                        @include('admin.professions.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

