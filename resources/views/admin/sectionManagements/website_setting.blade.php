@extends('layouts.admin')
@section('title')
    {{ __('Website Setting') }}
@endsection
@section('content')
    @include('includes.page_header_index', [
        'title' => __('Website Setting'),
        'url' => '',
        'icon' => $icon ?? 'pe-7s-menu',
        'permission' => '',
    ])
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="{{ route('admin.websiteSettings.save') }}" method="POST" enctype="multipart/form-data">
                        <button type="submit" id="submitBtn" class="btn btn-primary pull-right">Update All</button>
                        <br>
                        <br>
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                Logo
                            </div>
                            <div class="card-body">
                                <div id="imageDiv">
                                    @php
                                        $websiteLogo = $websiteSettings->where('key', 'logo')->first()->value;
                                    @endphp
                                    <img height="50px" width="auto"
                                        src="{{ $websiteLogo ? asset('images/' . $websiteLogo) : defaultImage('logo') }}"
                                        alt="">
                                    <br>
                                    <br>
                                    <input id="image" type="file" accept="image/*" name="logo" class="dropify"
                                        style="margin-top: 10px">
                                </div>

                                @include('includes.image_crop_preview')
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                Colors
                            </div>
                            <div class="card-body">
                                Theme Color
                                <input type="color" placeholder="Theme Color" name="theme_color"
                                    value="{{ $websiteSettings->where('key', 'theme_color')->first()->value }}"
                                    class="form-control col-md-6">
                                <br>
                                Header Color <br>
                                <input type="color" placeholder="Theme Color" name="header_color"
                                    value="{{ $websiteSettings->where('key', 'header_color')->first()->value }}"
                                    class="form-control col-md-6">
                                <br>
                                Footer Color
                                <input type="color" placeholder="Theme Color" name="footer_color"
                                    value="{{ $websiteSettings->where('key', 'footer_color')->first()->value }}"
                                    class="form-control col-md-6">
                                <br>
                            </div>
                        </div>
                        <br>

                        <div class="card">
                            <div class="card-header">
                                Particles And Preloader
                            </div>
                            <div class="card-body">
                                <br>
                                Show Particle Animation:
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input name="particle_status" @if ($websiteSettings->where('key', 'particle_status')->first()->value == 1) checked @endif
                                            type="checkbox" class="custom-control-input" id="button_status">
                                        <label class="custom-control-label" for="button_status">{{ __('') }}</label>
                                    </div>
                                </div>
                                <br>
                                Show Preloader :
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input name="preloader_status" @if ($websiteSettings->where('key', 'preloader_status')->first()->value == 1) checked @endif
                                            type="checkbox" class="custom-control-input" id="button_status2">
                                        <label class="custom-control-label" for="button_status2">{{ __('') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <button type="submit" id="submitBtn" class="btn btn-primary pull-right">Update All</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    {{-- Dropify --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" />
@endpush

@section('script')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        // CKEDITOR.replace( 'details' );
        CKEDITOR.replace('text_3', {
            filebrowserUploadUrl: "{{ route('ckeditor.image.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
@endsection

@include('includes.image_crop', ['width' => 220, 'height' => 100])
