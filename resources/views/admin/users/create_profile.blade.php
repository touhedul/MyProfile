@extends('layouts.admin')
@section('title')
    {{ __('Complete Your Profile') }}
@endsection
@section('content')
    @include('includes.page_header', [
        'title' => __('Complete Your Profile'),
        'url' => route('admin.users.index'),
        'icon' => 'pe-7s-user',
        'permission' => 'user-view',
    ])
    @push('css')
        {{-- select2 --}}
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        {{-- Dropify --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
            integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
            crossorigin="anonymous" />
    @endpush


    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form class="" data-parsley-validate method="POST" id="change-password-form"
                        action="{{ route('admin.users.createProfile') }}" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label for="password" class="">{{ __('Address') }}<span class="text-red">*</span> <i class="fas fa-info-circle" data-toggle="tooltip" title="Write your current address!"></i></label>
                            <input placeholder="Write your address. Ex: Dhaka,Bangladesh" value="{{ old('address') }}" class="form-control" type="text" name="address" maxlength="50" minlength="4" required >
                        </div>


                        <div class="form-group">
                            <label for="password" class="">{{ __('Profile Title') }}<span class="text-red">*</span> <i class="fas fa-info-circle" data-toggle="tooltip" title="Write your current profession title!"></i></label>
                            <input placeholder="Write your designation title. Ex: Software Engineer, Digital Marketer" value="{{ old('profile_title') }}" class="form-control" type="text" name="profile_title" minlength="3"
                               required maxlength="50">
                        </div>

                        <div class="form-group">
                            <label for="password" class="">{{ __('Profession') }}<span class="text-red">*</span> <i class="fas fa-info-circle" data-toggle="tooltip" title="Write and press enter to add new profession!"></i>
                            </label>

                            <select class="form-control profession" name="profession[]" multiple="multiple" required>
                                @foreach ($professions as $profession)
                                    <option value="{{$profession->name}}">{{ $profession->name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="password" class="">{{ __('Skills') }}<span class="text-red">*</span> <i class="fas fa-info-circle" data-toggle="tooltip" title="Write and press enter to add new skill!"></i></label>
                            <select class="form-control skills" name="skills[]" multiple="multiple" required>
                                @foreach ($skillList as $skill)
                                <option value="{{$skill->name}}">{{ $skill->name }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="password" class="">{{ __('Profile Image') }}<span class="text-red">*</span> <i class="fas fa-info-circle" data-toggle="tooltip" title="Add a professional profile image! Max size 5 mb"></i></label>
                            <input class="form-control dropify" type="file" name="image" required accept="image/*">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">
                                {{ __('Create Profile') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
            integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
            crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('.dropify').dropify();
                $('.profession').select2({
                    placeholder: "Choose your professions",
                    tags: true
                });
                $('.skills').select2({
                    tags: true,
                    placeholder: "Choose your skills",
                });

            });
        </script>
    @endpush
@endsection
