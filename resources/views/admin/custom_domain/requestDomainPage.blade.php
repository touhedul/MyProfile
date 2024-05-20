@extends('layouts.admin')
@section('title', __('Request Doamin'))
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-help2 icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>{{ __('Request Doamin') }}</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">

                    <h5 class="card-title text-primary">{{ __('Request Doamin') }} </h5><br>
                </div>
                <div class="card-body">
                    <div class="alert alert-danger" id="error" style="display: none"></div>
                    <form class="" data-parsley-validate method="POST" id="change-password-form"
                        action="{{ route('admin.requestDomain') }}">
                        @csrf


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Domain') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Write sub domain keyword" class="form-control" id="oldpassword"
                                    type="password" name="domain" required><input disabled type="text"
                                    value=".myprofile.com" />

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
