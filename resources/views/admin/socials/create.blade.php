@extends('layouts.admin')
@section('title'){{__('Create')}} {{ __('Social') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Create')." ". __('Social'),'url'=>route('admin.socials.index'),'icon' => $icon??'','permission'=>'Social-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    {!! Form::open(['route' => 'admin.socials.store']) !!}

                        @include('admin.socials.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

