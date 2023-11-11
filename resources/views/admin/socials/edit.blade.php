@extends('layouts.admin')
@section('title'){{ __('Update') }} {{__('Social')}} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Update')." ".__('Social'),'url'=>route('admin.socials.index'),'icon' => $icon??'','permission'=>'Social-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                   {!! Form::model($social, ['route' => ['admin.socials.update', $social->id], 'method' => 'patch']) !!}

                        @include('admin.socials.fields')

                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

