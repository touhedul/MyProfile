@extends('layouts.admin')
@section('title'){{ __('Achievements') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Achievements'),'url'=>route('admin.achievements.create'),'icon' => $icon??'','permission'=>'Achievement-create'])


<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card">
                <div class="card-header">
                    Texts
                </div>
                <div class="card-body">
                    <form action="{{route('admin.achievements.saveText')}}" method="POSt">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{$achievementInfo->where('key','achievement_text')->first()->value}}" name="achievement_text" placeholder="My achievements">
                        </div>
                        <div class="form-group">
                            <textarea name="achievement_description" id="" cols="30" rows="10" placeholder="How I can help take your next achievement to new heights! Thousands of clients have procured exceptional results while working with Me.">{{$achievementInfo->where('key','achievement_description')->first()->value}}
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
                    @include('admin.achievements.table')
                </div>
            </div>
        </div>
    </div>
</div>

@include('includes.ckeditor_push',['name'=>'achievement_description'])
@endsection

