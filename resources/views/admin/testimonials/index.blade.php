@extends('layouts.admin')
@section('title'){{ __('Testimonials') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Testimonials'),'url'=>route('admin.testimonials.create'),'icon' => $icon??'','permission'=>'Testimonial-create'])


<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card">
                <div class="card-header">
                    Texts
                </div>
                <div class="card-body">
                    <form action="{{route('admin.testimonials.saveText')}}" method="POSt">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{$testimonialInfo->where('key','testimonial_text')->first()->value}}" name="testimonial_text" placeholder="My testimonials">
                        </div>
                        <div class="form-group">
                            <textarea name="testimonial_description" id="" cols="30" rows="10" placeholder="How I can help take your next testimonial to new heights! Thousands of clients have procured exceptional results while working with Me.">{{$testimonialInfo->where('key','testimonial_description')->first()->value}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    @include('admin.testimonials.table')
                </div>
            </div>
        </div>
    </div>
</div>

@include('includes.ckeditor_push',['name'=>'testimonial_description'])
@endsection

