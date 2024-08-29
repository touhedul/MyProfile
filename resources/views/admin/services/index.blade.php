@extends('layouts.admin')
@section('title')
    {{ __('Services') }}
@endsection
@section('content')
    @include('includes.page_header_index', [
        'title' => __('Services'),
        'url' => route('admin.services.create'),
        'icon' => $icon ?? '',
        'permission' => 'Service-create',
    ])

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
                        <form action="{{ route('admin.services.saveText') }}" method="POSt">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    value="{{ $serviceInfo->where('key', 'service_text')->first()->value }}"
                                    name="service_text" placeholder="My Services" maxlength="190">
                            </div>
                            <div class="form-group">
                                <textarea name="service_description">{{ $serviceInfo->where('key', 'service_description')->first()->value }}
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
    <script src="{{ asset('admin/assets/scripts/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('service_description', {
            filebrowserUploadUrl: "{{ route('ckeditor.image.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush
