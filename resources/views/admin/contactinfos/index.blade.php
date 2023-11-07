@extends('layouts.admin')
@section('title'){{ __('Contactinfos') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Contactinfos'),'url'=>route('admin.contactinfos.create'),'icon' => $icon??'','permission'=>'Contactinfo-create'])


@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/theme1/vendor/font-awesome/css/all.min.css') }}" />
@endpush
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card">
                <div class="card-header">
                    Texts
                </div>
                <div class="card-body">
                    <form action="{{route('admin.contactinfos.saveText')}}" method="POSt">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{$contactInfo->where('key','contactinfo_text')->first()->value}}" name="contactinfo_text" placeholder="My Services">
                        </div>
                        <div class="form-group">
                            <textarea name="contactinfo_description" id="" cols="30" rows="10" placeholder="How I can help take your next project to new heights! Thousands of clients have procured exceptional results while working with Me.">{{$contactInfo->where('key','contactinfo_description')->first()->value}}
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
                    @include('admin.contactinfos.table')
                </div>
            </div>
        </div>
    </div>
</div>

@include('includes.ckeditor_push',['name'=>'contactinfo_description'])
@endsection

