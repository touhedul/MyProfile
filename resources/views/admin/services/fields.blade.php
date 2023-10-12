@push('css')


<link rel="stylesheet" type="text/css" href="{{ asset('frontend/theme1/vendor/font-awesome/css/all.min.css') }}" />
<link rel="stylesheet" href="{{asset('admin/assets/iconpicker/fontawesome-iconpicker.min.css')}}">

@endpush

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('Title')) !!}
    {!! Form::text('title', null, ['class' => 'form-control','required','maxlength' => 191]) !!}
</div>


<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description',  __('Description')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','required','maxlength' => 65530]) !!}
</div>


<!-- Icon Field -->
<div class="form-group">

    <input type="hidden" name="icon" value="" id="iconInput">
    <div class="btn-group">

          <button data-selected="graduation-cap" type="button" name="drop" class="icp demo btn btn-default dropdown-toggle iconpicker-component" data-toggle="dropdown">

              Select Icon  <i class="fa fa-fw"></i>

              <span class="caret"></span>

          </button>

          <div class="dropdown-menu"></div>

        </div>
</div>




<div class="form-group">
    <div class="custom-control custom-switch">
        <input name="status" value="1"
        @if (isset($service) && $service->status == 1)
            checked
        @elseif (!isset($service))
            checked
        @endif
        type="checkbox" class="custom-control-input" id="customSwitch1">
        <label class="custom-control-label" for="customSwitch1">{{ __('Status') }}</label>
    </div>
</div>
<!-- Submit Field -->
<div class="form-group">
    {{ Form::button('<i class="fas fa-plus-circle"></i> '.__('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary '] )  }}
    <a href="{{ route('admin.services.index') }}" class="btn btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i> {{ __("Cancel") }}</a>
</div>


@push('script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    // CKEDITOR.replace( 'details' );
        CKEDITOR.replace( 'description', {
            filebrowserUploadUrl: "{{route('ckeditor.image.upload', ['_token' => csrf_token()])}}",
            filebrowserUploadMethod: 'form'
        });
</script>

<script src="{{asset('admin/assets/iconpicker/fontawesome-iconpicker.min.js')}}"></script>


<script>
    $(document).ready(function(){
        $('.demo').iconpicker({
            hideOnSelect:true
        });
        $('.demo').on('iconpickerSelected', function(event){
            var icon = event.iconpickerValue;
            $("#iconInput").val(icon);
        });
    })

</script>

@endpush

