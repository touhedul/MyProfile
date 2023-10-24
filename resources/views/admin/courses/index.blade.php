@extends('layouts.admin')
@section('title'){{ __('Courses') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Courses'),'url'=>route('admin.courses.create'),'icon' => $icon??'','permission'=>'Course-create'])

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card">
                <div class="card-header">
                    Texts
                </div>
                <div class="card-body">
                    <form action="{{route('admin.courses.saveText')}}" method="POSt">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{$courseInfo->where('key','course_text')->first()->value}}" name="course_text" placeholder="My courses">
                        </div>
                        <div class="form-group">
                            <textarea name="course_description" id="" cols="30" rows="10" placeholder="How I can help take your next course to new heights! Thousands of clients have procured exceptional results while working with Me.">{{$courseInfo->where('key','course_description')->first()->value}}
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
                    @include('admin.courses.table')
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
@include('includes.ckeditor_push',['name' => 'course_description'])
@endpush
@endsection

