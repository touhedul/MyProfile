@extends('layouts.admin')
@section('title'){{ __('Services') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Services'),'url'=>route('admin.services.create'),'icon' => $icon??'','permission'=>'Service-create'])

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
                    <form action="" method="POSt">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{$serviceInfo->where('key','service_text')->first()->value}}" name="service_text" placeholder="My Services">
                        </div>
                        <div class="form-group">
                            <textarea name="service_description" id="" cols="30" rows="10" placeholder="How I can help take your next project to new heights! Thousands of clients have procured exceptional results while working with Me.">{{$serviceInfo->where('key','service_description')->first()->value}}
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
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @include('admin.services.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    // CKEDITOR.replace( 'details' );
        CKEDITOR.replace( 'service_description', {
            filebrowserUploadUrl: "{{route('ckeditor.image.upload', ['_token' => csrf_token()])}}",
            filebrowserUploadMethod: 'form'
        });
</script>
@endpush
