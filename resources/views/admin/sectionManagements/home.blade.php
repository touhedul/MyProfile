@extends('layouts.admin')
@section('title')
    {{ __('Homes') }}
@endsection
@section('content')
    @include('includes.page_header_index', [
        'title' => __('Home Management'),
        'url' => '',
        'icon' => $icon ?? 'pe-7s-home',
        'permission' => '',
    ])
    @push('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
    @endpush
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="{{ route('admin.homeManagement.save') }}" method="POST" enctype="multipart/form-data">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary pull-right" id="submitBtn">Update All</button>
                        </div>
                        <br>
                        <br>
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                Sliders
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div id="imageDiv1">
                                            <img class="img-fluid"
                                                src="{{ $userHome->slider_1 ? asset('images/' . $userHome->slider_1) : defaultImage($userHome->default_slider_1) }}"
                                                alt="">
                                            (1500 X 1000)
                                            <div class="form-group">
                                                <input type="file" accept="image/*" name="slider_1"
                                                    style="margin-top: 10px" class="dropify" id="image1">
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div id="imagePreview1" class="col-md-12"></div>
                                        </div>
                                        <input type="hidden" name="cropCoordinates1" id="cropCoordinates1">

                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input name="slider_1_status"
                                                    @if ($userHome->slider_1_status == 1) checked @endif type="checkbox"
                                                    class="custom-control-input" id="customSwitch_slider_1">
                                                <label class="custom-control-label"
                                                    for="customSwitch_slider_1">{{ __('') }}</label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div id="imageDiv2">
                                            <img class="img-fluid"
                                                src="{{ $userHome->slider_2 ? asset('images/' . $userHome->slider_2) : defaultImage($userHome->default_slider_2) }}"
                                                alt=""> (1500 X 1000)
                                            <input type="file" accept="image/*" name="slider_2" style="margin-top: 10px"
                                                class="dropify" id="image2">
                                        </div>


                                        <div class="row justify-content-center">
                                            <div id="imagePreview2" class="col-md-12"></div>
                                        </div>
                                        <input type="hidden" name="cropCoordinates2" id="cropCoordinates2">

                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input name="slider_2_status"
                                                    @if ($userHome->slider_2_status == 1) checked @endif type="checkbox"
                                                    class="custom-control-input" id="customSwitch_slider_2">
                                                <label class="custom-control-label"
                                                    for="customSwitch_slider_2">{{ __('') }}</label>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div id="imageDiv3">
                                            <img class="img-fluid"
                                                src="{{ $userHome->slider_3 ? asset('images/' . $userHome->slider_3) : defaultImage($userHome->default_slider_3) }}"
                                                alt=""> (1500 X 1000)
                                            <input type="file" accept="image/*" name="slider_3" style="margin-top: 10px"
                                                class="dropify" id="image3">
                                        </div>


                                        <div class="row justify-content-center">
                                            <div id="imagePreview3" class="col-md-12"></div>
                                        </div>
                                        <input type="hidden" name="cropCoordinates3" id="cropCoordinates3">

                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input name="slider_3_status"
                                                    @if ($userHome->slider_3_status == 1) checked @endif type="checkbox"
                                                    class="custom-control-input" id="customSwitch_slider_3">
                                                <label class="custom-control-label"
                                                    for="customSwitch_slider_3">{{ __('') }}</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                Texts
                            </div>
                            <div class="card-body">
                                <input type="text" placeholder="Write welcome message" name="text_1"
                                    value="{{ $userHome->text_1 }}" class="form-control col-md-6">
                                <br>
                                <div id="text">
                                    @if ($userHome->text_2)
                                        @foreach ($userHome->text_2 as $text)
                                            <div class="row text-row" style="margin-top: 5px">
                                                <div class="col-md-6">
                                                    <input type="text" placeholder="Type text..." name="text_2[]"
                                                        value="{{ $text }}" class="form-control">
                                                </div>

                                                <div class="col-md-6" style="margin-top:5px">
                                                    <a href="javascript:void(0);" class="add"><i style=""
                                                            class="fa fa-plus fa-lg"></i></a>
                                                    @if ($loop->index != 0)
                                                        <a style="margin-left:15px;color:red" href="javascript:void(0);"
                                                            class="remove"><i class="fa fa-trash fa-lg"></i></a>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <br>
                                <input type="text" name="text_3" value="{{ $userHome->text_3 }}"
                                    class="form-control col-md-6"
                                    placeholder="Write profile title. Ex: Software Engineer, Digital Marketer">
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                Button
                            </div>
                            <div class="card-body">
                                @if ($userHome->file)
                                    <a download href="{{ asset('files/' . $userHome->file) }}"> Download </a>
                                @endif
                                <input type="file" name="file" class="form-control col-md-6">
                                <br>
                                <input type="text" name="button_text" value="{{ $userHome->button_text }}"
                                    class="form-control  col-md-6">
                                <br>
                                Show Button :
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input name="button_status" @if ($userHome->button_status == 1) checked @endif
                                            type="checkbox" class="custom-control-input" id="button_status">
                                        <label class="custom-control-label"
                                            for="button_status">{{ __('') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary pull-right" id="submitBtn">Update All</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
            $(document).on('click', '.add', function() {
                var newDiv =
                    '<div class="row text-row" style="margin-top: 5px"><div class="col-md-6"> <input type="text" required placeholder="Type text..." name="text_2[]" value="" class="form-control"> </div> <div class="col-md-6" style="margin-top:5px"> <a href="javascript:void(0);" class="add"><i style="" class="fa fa-plus fa-lg"></i></a> <a style="margin-left:15px;color:red" href="javascript:void(0);" class="remove"><i  class="fa fa-trash fa-lg"></i></a></div></div>';

                $("#text").append(newDiv);
            });

            $(document).on('click', '.remove', function() {
                $(this).parent().parent().remove();
            });
        });
    </script>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>

    <script>
        // Initialize Croppie for each image field
        function initializeCroppie(imageInputId, previewId, cropDataInputId, imageDiv) {
            document.getElementById(imageInputId).addEventListener('change', function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    // Destroy previous croppie instance if any
                    if (window['croppie_' + previewId]) {
                        window['croppie_' + previewId].destroy();
                    }

                    // Initialize Croppie
                    var croppie = new Croppie(document.getElementById(previewId), {
                        viewport: {
                            width: 150,
                            height: 100,
                            type: 'square' // Change as per your requirement
                        },
                        enableZoom: true, // Disable zooming to ensure the selected area is fixed
                        boundary: {
                            width: '100%',
                            height: '300'
                        },
                        update: function(data) {
                            // Update hidden input field with new crop coordinates
                            document.getElementById(cropDataInputId).value = JSON.stringify(data);
                        }
                    });

                    // Bind selected image to croppie
                    croppie.bind({
                        url: e.target.result
                    });

                    // Store croppie instance globally
                    window['croppie_' + previewId] = croppie;
                };
                reader.readAsDataURL(this.files[0]);
                if (imageDiv == "imageDiv1") {
                    $("#imageDiv1").hide();
                } else if (imageDiv == "imageDiv2") {
                    $("#imageDiv2").hide();
                } else if (imageDiv == "imageDiv3") {
                    $("#imageDiv3").hide();
                }
            });
        }


        initializeCroppie('image1', 'imagePreview1', 'cropCoordinates1', 'imageDiv1');
        initializeCroppie('image2', 'imagePreview2', 'cropCoordinates2', 'imageDiv2');
        initializeCroppie('image3', 'imagePreview3', 'cropCoordinates3', 'imageDiv3');

        document.getElementById('submitBtn').addEventListener('click', function(e) {
            document.getElementById('cropCoordinates1').value = JSON.stringify(window['croppie_imagePreview1'].get());
            document.getElementById('cropCoordinates2').value = JSON.stringify(window['croppie_imagePreview2'].get());
            document.getElementById('cropCoordinates3').value = JSON.stringify(window['croppie_imagePreview3'].get());
            return true;
        });
    </script>
@endpush
