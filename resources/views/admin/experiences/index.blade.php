@extends('layouts.admin')
@section('title'){{ __('Experiences') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Experiences'),'url'=>route('admin.experiences.create'),'icon' => $icon??'','permission'=>'Experience-create'])

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card">
                <div class="card-header">
                    Texts
                </div>
                <div class="card-body">
                    <form action="{{route('admin.experiences.saveText')}}" method="POSt">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{$experienceInfo->where('key','experience_text')->first()->value}}" name="experience_text" placeholder="My experiences">
                        </div>
                        <div class="form-group">
                            <textarea name="experience_description" id="" cols="30" rows="10" placeholder="How I can help take your next experience to new heights! Thousands of clients have procured exceptional results while working with Me.">{{$experienceInfo->where('key','experience_description')->first()->value}}
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
                    @include('admin.experiences.table')
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
@include('includes.ckeditor_push',['name' => 'experience_description'])
@endpush
@endsection

