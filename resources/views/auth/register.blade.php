@extends('layouts.frontend')
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

                            {{-- <div class="form-group">
                            <label>Profession*</label>
                            <input maxlength="191" autofocus required type="text" value="{{old('profession')}}" name="profession"
                                class="form-control" placeholder="Enter Profession">
                        </div> --}}

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
@endsection
