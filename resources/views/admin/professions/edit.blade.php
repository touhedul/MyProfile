@extends('layouts.admin')
@section('title'){{ __('Update') }} {{__('Profession')}} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Update')." ".__('Profession'),'url'=>route('admin.professions.index'),'icon' => $icon??'','permission'=>'Profession-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                   {!! Form::model($profession, ['route' => ['admin.professions.update', $profession->id], 'method' => 'patch']) !!}

                        @include('admin.professions.fields')

                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

