@extends('layouts.admin')
@section('title')
    {{ __('Request') }} {{ __('Custom Domain') }}
@endsection
@section('content')
    @include('includes.page_header', [
        'title' => __('Request') . ' ' . __('Custom Domain'),
        'url' => route('admin.customDomains.index'),
        'icon' => $icon ?? 'pe-7s-home',
        'permission' => 'CustomDomain-view',
    ])
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">

                    @if ($customDomain)
                        <h3>Your Domain : <a
                                @if ($customDomain->status == 1) href="{{ $customDomain->domain }}"
                                target="_blank" @endif>{{ $customDomain->domain }}</a>

                            @if ($customDomain->status === null)
                                <div class="col-md-2 mb-2 mr-2 badge badge-warning">{{ __('Pending') }}</div>
                            @elseif ($customDomain->status == 0)
                                <div class="col-md-2 mb-2 mr-2 badge badge-danger">{{ __('Disabled') }}</div>
                            @elseif ($customDomain->status == 1)
                                <div class="col-md-2 mb-2 mr-2 badge badge-success">{{ __('Active') }}</div>
                            @endif
                            <br />
                        </h3>
                    @else
                        <div class="card-body">
                            {!! Form::open(['route' => 'admin.customDomains.requestDomain']) !!}


                            <label>Sub Doamin</label>
                            <div class="row input-group form-group col-md-6">
                                <input type="text" class="form-control" id="exampleInput" value="{{ old('domain') }}"
                                    required placeholder="Enter sub domain text" name="domain">
                                <span
                                    class="input-group-text">{{ Str::replace(['http://', 'https://'], '', config('app.url')) }}</span>
                            </div>

                            <div class="form-group">
                                {{ Form::button('<i class="fas fa-plus-circle"></i> ' . __('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary ']) }}
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-danger"><i
                                        class="fa fa-window-close" aria-hidden="true"></i> {{ __('Cancel') }}</a>
                            </div>

                            {!! Form::close() !!}
                        </div>
                    @endif
                </div>
                <br>

            </div>
        </div>
    </div>
@endsection
