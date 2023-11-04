@extends('layouts.admin')
@section('title'){{ __('Education') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Education'),'url'=>route('admin.education.create'),'icon' => $icon??'','permission'=>'Education-create'])


<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card">
                <div class="card-header">
                    Texts
                </div>
                <div class="card-body">
                    <form action="{{route('admin.education.saveText')}}" method="POSt">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{$educationInfo->where('key','education_text')->first()->value}}" name="education_text" placeholder="My educations">
                        </div>
                        <div class="form-group">
                            <textarea name="education_description" id="" cols="30" rows="10" placeholder="How I can help take your next education to new heights! Thousands of clients have procured exceptional results while working with Me.">{{$educationInfo->where('key','education_description')->first()->value}}
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
                    @include('admin.education.table')
                </div>
            </div>
        </div>
    </div>
</div>

@include('includes.ckeditor_push',['name'=>'education_description'])
@endsection

