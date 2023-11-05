@extends('layouts.admin')
@section('title'){{ __('Update') }} {{__('Testimonial')}} @endsection
@section('content')
@include('includes.page_header',['title'=>__('Update')." ".__('Testimonial'),'url'=>route('admin.testimonials.index'),'icon' => $icon??'','permission'=>'Testimonial-view'])
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                   {!! Form::model($testimonial, ['route' => ['admin.testimonials.update', $testimonial->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('admin.testimonials.fields')

                   {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

