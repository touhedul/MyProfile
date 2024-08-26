{{-- @extends('layouts.frontend')
@section('title', 'Register')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Register here
                    </div>
                    <div class="card-body">
                        <form data-parsley-validate enctype="multipart/form-data" action="{{ route('register') }}"
                            method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name*</label>
                                <input maxlength="191" autofocus required type="text" value="{{ old('name') }}"
                                    name="name" class="form-control" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label>Email address*</label>
                                <input maxlength="191" value="{{ old('email') }}" name="email" required type="email"
                                    class="form-control" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input value="{{ old('phone') }}" name="phone" type="text" class="form-control"
                                    placeholder="Enter Phone">
                            </div>

                            <div class="form-group">
                                <label>Password*</label>
                                <input required name="password" minlength="8" type="password" class="form-control"
                                    placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password*</label>
                                <input required name="password_confirmation" minlength="8" type="password"
                                    class="form-control" placeholder="ConfirmPassword">
                            </div>
                            <div class="form-group">
                                <label>Referral Code</label>
                                <input maxlength="191" type="text" value="{{ old('referral_code') }}"
                                    name="referral_code" class="form-control" placeholder="Enter referral code">
                            </div>
                            <div class="form-footer pt-4 pt-2 mt-4 border-top">
                                <button type="submit" class="mb-1 btn btn-success">
                                    <i class=" mdi mdi-checkbox-marked-outline mr-1"></i> Register
                                </button>
                                <div class="pull-right">
                                    Already have an account? <a href="{{ route('login') }}">Login here</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}


@extends('layouts.auth')
@section('title', 'Register')
@section('content')
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" placeholder="Your Name" />
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email" />
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="pass" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" />
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                statements in <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{ asset('frontend/business_site/auth/images/signup-image.jpg') }}"
                            alt="sing up image"></figure>
                    <a href="#" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>
@endsection
