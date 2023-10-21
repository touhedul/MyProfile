@extends('layouts.admin')
@section('title'){{ __('Projects') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Projects'),'url'=>route('admin.projects.create'),'icon' => $icon??'','permission'=>'Project-create'])

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card">
                <div class="card-header">
                    Texts
                </div>
                <div class="card-body">
                    <form action="{{route('admin.projects.saveText')}}" method="POSt">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{$projectInfo->where('key','project_text')->first()->value}}" name="project_text" placeholder="My projects">
                        </div>
                        <div class="form-group">
                            <textarea name="project_description" id="" cols="30" rows="10" placeholder="How I can help take your next project to new heights! Thousands of clients have procured exceptional results while working with Me.">{{$projectInfo->where('key','project_description')->first()->value}}
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
                    @include('admin.projects.table')
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.ckeditor_push',['name' => 'project_description'])
@endsection

