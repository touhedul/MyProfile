@extends('layouts.admin')
@section('title'){{ __('Socials') }} @endsection
@section('content')
@include('includes.page_header_index',['title'=>__('Socials'),'url'=>route('admin.socials.create'),'icon' => $icon??'','permission'=>'Social-create'])


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
                    <form action="{{route('admin.socials.saveText')}}" method="POSt">
                        @csrf
                        <div class="form-group">
                            <textarea name="footer_text" id="" cols="30" rows="10" class="form-control" placeholder="Copyright @2024 All right reserved!">{{$footer->where('key','footer_text')->first()->value}}
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
                    @include('admin.socials.table')
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @include('includes.ckeditor_push',['name'=>'footer_text']) --}}
@endsection

