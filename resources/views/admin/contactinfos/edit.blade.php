@extends('layouts.admin')
@section('title'){{ __('Update') }} {{__('Contactinfo')}} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Update')." ".__('Contactinfo'),'url'=>route('admin.contactinfos.index'),'icon' => $icon??'','permission'=>'Contactinfo-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                   {!! Form::model($contactinfo, ['route' => ['admin.contactinfos.update', $contactinfo->id], 'method' => 'patch']) !!}

                        @include('admin.contactinfos.fields')

                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

