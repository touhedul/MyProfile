@extends('layouts.admin')
@section('title'){{__('Create')}} {{ __('Testimonial') }} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Create')." ". __('Testimonial'),'url'=>route('admin.testimonials.index'),'icon' => $icon??'','permission'=>'Testimonial-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                    {!! Form::open(['route' => 'admin.testimonials.store', 'files' => true]) !!}

                        @include('admin.testimonials.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

