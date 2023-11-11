@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/theme1/vendor/font-awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/iconpicker/fontawesome-iconpicker.min.css') }}">
@endpush

<!-- Link Field -->
<div class="form-group">
    {!! Form::label('link', __('Link')) !!}
    {!! Form::text('link', null, ['class' => 'form-control','required','maxlength' => 191]) !!}
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
@include('includes.status_field',['variable' => @$social])


<!-- Submit Field -->
<div class="form-group">
    {{ Form::button('<i class="fas fa-plus-circle"></i> '.__('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary '] )  }}
    <a href="{{ route('admin.socials.index') }}" class="btn btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i> {{ __("Cancel") }}</a>
</div>

@push('script')

    <script src="{{ asset('admin/assets/iconpicker/fontawesome-iconpicker.min.js') }}"></script>


    <script>
        $(document).ready(function() {

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
