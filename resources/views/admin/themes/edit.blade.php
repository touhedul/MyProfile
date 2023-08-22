@extends('layouts.admin')
@section('title'){{ __('Update') }} {{__('Theme')}} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Update')." ".__('Theme'),'url'=>route('admin.themes.index'),'icon' => $icon??'','permission'=>'Theme-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                   {!! Form::model($theme, ['route' => ['admin.themes.update', $theme->id], 'method' => 'patch']) !!}

                        @include('admin.themes.fields')

                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

