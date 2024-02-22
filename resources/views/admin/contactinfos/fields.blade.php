@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/theme1/vendor/font-awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/iconpicker/fontawesome-iconpicker.min.css') }}">
@endpush

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('Title')) !!}
    {!! Form::text('title', null, ['class' => 'form-control','required','maxlength' => 191]) !!}
</div>


<!-- Details Field -->
<div class="form-group">
    {!! Form::label('details',  __('Details')) !!}
    {!! Form::textarea('details', null, ['class' => 'form-control','required','maxlength' => 65530]) !!}
</div>



<!-- Icon Field -->
<div class="form-group">

    <input type="hidden" name="icon" value="" id="iconInput">
    <div class="btn-group">

        <button data-selected="graduation-cap" type="button" name="drop"
            class="icp demo btn btn-default dropdown-toggle iconpicker-component" data-toggle="dropdown">

            Select Icon <i class="fa fa-fw"></i>

            <span class="caret"></span>

        </button>

        <div class="dropdown-menu"></div>

    </div>
</div>


<!-- Status Field -->
@include('includes.status_field',['variable' => @$contactinfo])


<!-- Submit Field -->
<div class="form-group">
    {{ Form::button('<i class="fas fa-plus-circle"></i> '.__('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary '] )  }}
    <a href="{{ route('admin.contactinfos.index') }}" class="btn btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i> {{ __("Cancel") }}</a>
</div>

{{-- @include('includes.ckeditor') --}}
@push('script')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        // CKEDITOR.replace( 'details' );
        CKEDITOR.replace('details', {
            filebrowserUploadUrl: "{{ route('ckeditor.image.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>

    <script src="{{ asset('admin/assets/iconpicker/fontawesome-iconpicker.min.js') }}"></script>


    <script>
        $(document).ready(function() {

            @if (isset($contactinfo) && $contactinfo->icon)
                $("#iconInput").val("{{ $contactinfo->icon }}");
            @endif
            $('.demo').iconpicker({
                hideOnSelect: true,
                @if (isset($contactinfo) && $contactinfo->icon)
                selected:'{{ $contactinfo->icon }}'
                @endif
            });
            $('.demo').on('iconpickerSelected', function(event) {
                var icon = event.iconpickerValue;
                $("#iconInput").val(icon);
            });
        })
    </script>

@endpush
