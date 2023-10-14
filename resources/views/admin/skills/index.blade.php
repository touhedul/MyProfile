@extends('layouts.admin')
@section('title')
    {{ __('Skills') }}
@endsection
@section('content')
    @include('includes.page_header_index', [
        'title' => __('Skills'),
        'url' => route('admin.skills.create'),
        'icon' => $icon ?? '',
        'permission' => 'Skill-create',
    ])
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card">
                    <div class="card-header">
                        Texts
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.skills.saveText') }}" method="POSt" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    value="{{ $skillInfo->where('key', 'skill_text')->first()->value }}" name="skill_text"
                                    placeholder="My Services">
                            </div>
                            <div class="form-group">
                                <textarea name="skill_description" id="" cols="30" rows="10"
                                    placeholder="How I can help take your next project to new heights! Thousands of clients have procured exceptional results while working with Me.">{{ $skillInfo->where('key', 'skill_description')->first()->value }}
                            </textarea>
                            </div>
                            <div class="form-group">
                                <img height="100px" width="120px"
                                    src="{{ $skillInfo->where('key', 'skill_image')->first()->value ? asset('images/' . $skillInfo->where('key', 'skill_image')->first()->value) : defaultImage('skill_image') }}"
                                    alt="">
                                    <br>
                                (700 X 470) <br>
                                <input type="file" accept="image/*" name="skill_image" style="margin-top: 10px">

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="table-responsive">
                        @include('admin.skills.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('includes.ckeditor_push', ['name' => 'skill_description'])

{{-- @section('script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    // CKEDITOR.replace( 'details' );
        CKEDITOR.replace( 'skill_description', {
            filebrowserUploadUrl: "{{route('ckeditor.image.upload', ['_token' => csrf_token()])}}",
            filebrowserUploadMethod: 'form'
        });
</script>
@endsection --}}

{{-- @push('script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    // CKEDITOR.replace( 'details' );
        CKEDITOR.replace( 'skill_description', {
            filebrowserUploadUrl: "{{route('ckeditor.image.upload', ['_token' => csrf_token()])}}",
            filebrowserUploadMethod: 'form'
        });
</script>
@endpush --}}

