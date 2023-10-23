@extends('layouts.admin')
@section('title')
    {{ __('Color Section') }}
@endsection
@section('content')
    @include('includes.page_header_index', [
        'title' => __('Color Section Management'),
        'url' => '',
        'icon' => $icon ?? 'pe-7s-menu',
        'permission' => '',
    ])
    <div class="row">
        <div class="col-md-12">


            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="{{ route('admin.colorSectionManagement.save') }}" method="POST"
                        enctype="multipart/form-data">
                        <button type="submit" class="btn btn-primary pull-right">Update All</button>
                        <br>
                        <br>
                        <br>
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                Show this section : &nbsp; &nbsp;
                                <div class="custom-control custom-switch">
                                    <input name="section_status" @if ($userColorSection->show_status == 1) checked @endif
                                        type="checkbox" class="custom-control-input" id="section_status">
                                    <label class="custom-control-label" for="section_status">{{ __('') }}</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                Texts
                            </div>
                            <div class="card-body">
                                <input type="text" placeholder="About Me" name="text_1"
                                    value="{{ $userColorSection->text_1 }}" class="form-control col-md-12">
                                <br>
                                <input type="text" placeholder="Hello! I am John" name="text_2"
                                    value="{{ $userColorSection->text_2 }}" class="form-control col-md-12">
                                <br>
                            </div>
                        </div>

                        <br>

                        <div class="card">
                            <div class="card-header">
                                Color
                            </div>
                            <div class="card-body">
                                <br>
                                <input type="color" name="color" placeholder="Section Color"
                                    value="{{ $userColorSection->color }}" class="form-control  col-md-6">
                                <br>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                Button
                            </div>
                            <div class="card-body">
                                <br>
                                <input type="text" name="button_text" placeholder="Button text"
                                    value="{{ $userColorSection->button_text }}" class="form-control  col-md-6">
                                <br>
                                Show Button :
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input name="button_status" @if ($userColorSection->show_button_status == 1) checked @endif
                                            type="checkbox" class="custom-control-input" id="button_status">
                                        <label class="custom-control-label" for="button_status">{{ __('') }}</label>
                                    </div>
                                </div>
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

@section('script')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('text_3', {
            filebrowserUploadUrl: "{{ route('ckeditor.image.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
