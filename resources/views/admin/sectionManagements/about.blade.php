@extends('layouts.admin')
@section('title')
    {{ __('About') }}
@endsection
@section('content')
    @include('includes.page_header_index', [
        'title' => __('About Management'),
        'url' => '',
        'icon' => $icon ?? 'pe-7s-id',
        'permission' => '',
    ])
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="{{ route('admin.aboutManagement.save') }}" method="POST" enctype="multipart/form-data">
                        <button type="submit" class="btn btn-primary pull-right">Update All</button>
                        <br>
                        <br>
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                image
                            </div>
                            <div class="card-body">
                                <img height="100px" width="125px"
                                src="{{ $userAbout->image ? asset('images/' . $userAbout->image) : defaultImage('about_image') }}"
                                alt="">
                                 (500 X 625)
                                 <br>
                                 <input type="file" accept="image/*" name="image" class="dropify" style="margin-top: 10px">
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                Texts
                            </div>
                            <div class="card-body">
                                <input type="text" placeholder="About Me" name="text_1" value="{{ $userAbout->text_1 }}" class="form-control col-md-6">
                                <br>
                                <input type="text" placeholder="Hello! I am John" name="text_2" value="{{ $userAbout->text_2 }}" class="form-control col-md-6">
                                <br>
                                <textarea name="text_3" placeholder="Write about yourself" id="" cols="30" rows="10" class="form-control">{!! $userAbout->text_3 !!}</textarea>
                            </div>
                        </div>
                        <br>

                        <div class="card">
                            <div class="card-header">
                                Counts
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="number" min="0" name="count_1" placeholder="10" value="{{ $userAbout->count_1 }}" class="form-control col-md-6">
                                        <br>
                                        <input type="text" name="count_text_1" placeholder="Years of experience" value="{{ $userAbout->count_text_1 }}" class="form-control col-md-6">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" min="0" name="count_2" placeholder="20" value="{{ $userAbout->count_2 }}" class="form-control col-md-6">
                                        <br>
                                        <input type="text" name="count_text_2" placeholder="Project Done" value="{{ $userAbout->count_text_2 }}" class="form-control col-md-6">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" min="0" name="count_3" placeholder="30" value="{{ $userAbout->count_3 }}" class="form-control col-md-6">
                                        <br>
                                        <input type="text" name="count_text_3" placeholder="Number of clients" value="{{ $userAbout->count_text_3 }}" class="form-control col-md-6">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                Button
                            </div>
                            <div class="card-body">
                                <br>
                                <input type="text" name="button_text" placeholder="Button text" value="{{ $userAbout->button_text }}"
                                    class="form-control  col-md-6">
                                <br>
                                Show Button :
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input name="button_status"
                                            @if ($userAbout->button_status == 1) checked @endif type="checkbox"
                                            class="custom-control-input" id="button_status">
                                        <label class="custom-control-label"
                                            for="button_status">{{ __('') }}</label>
                                    </div>
                                </div>
                                <br>
                                <input type="text" name="extra_text" placeholder="Write extra text" value="{{ $userAbout->extra_text }}" class="form-control col-md-6">
                            </div>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary pull-right">Update All</button>
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
        CKEDITOR.replace( 'text_3', {
            filebrowserUploadUrl: "{{route('ckeditor.image.upload', ['_token' => csrf_token()])}}",
            filebrowserUploadMethod: 'form'
        });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
    integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('.dropify').dropify();
    });
</script>
@endsection
