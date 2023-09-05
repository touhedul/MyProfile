@extends('layouts.admin')
@section('title')
    {{ __('Homes') }}
@endsection
@section('content')
    @include('includes.page_header_index', [
        'title' => __('Home Management'),
        'url' => '',
        'icon' => $icon ?? 'pe-7s-menu',
        'permission' => '',
    ])
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="{{ route('admin.menuManagement.save') }}" method="POST">
                        <button type="submit" class="btn btn-primary pull-right">Update All</button>
                        <br>
                        <br>
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                Sliders
                            </div>
                            <div class="card-body">
                                <input type="file" name="slider_1">
                                <input type="file" name="slider_1">
                                <input type="file" name="slider_1">
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                Texts
                            </div>
                            <div class="card-body">
                                <input type="text" value="{{ $userHome->text_1 }}" class="form-control col-md-6">
                                {{-- <br> --}}
                                {{-- Typing Texts: --}}
                                <br>
                                <input type="text" value="{{ $userHome->text_2[0] }}" class="form-control col-md-6">
                                <br>
                                <input type="text" value="{{ $userHome->text_2[1] }}" class="form-control col-md-6">
                                <br>
                                <input type="text" value="{{ $userHome->text_3 }}" class="form-control col-md-6">
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                Button
                            </div>
                            <div class="card-body">
                                <input type="file" name="cv" class="form-control col-md-6">
                                <br>
                                <input type="text" name="button_text" value="{{ $userHome->button_text }}" class="form-control  col-md-6">
                                <br>
                                Show Button :
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input name="show_status[]" value="{{ $userHome->id }}"
                                            @if ($userHome->button_status == 1) checked @endif type="checkbox"
                                            class="custom-control-input" id="customSwitch{{ $userHome->id }}">
                                        <label class="custom-control-label"
                                            for="customSwitch{{ $userHome->id }}">{{ __('') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary pull-right">Update All</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
