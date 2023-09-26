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

<ul id="icon-list">
    <li><i class="fas fa-home"></i> Home</li>
    <li><i class="fas fa-heart"></i> Like</li>
    <li><i class="fas fa-envelope"></i> Email</li>
  </ul>
<!-- Icon Field -->
<div class="form-group">
    {!! Form::label('icon', __('Icon')) !!}
    {!! Form::text('icon', null, ['class' => 'form-control','required','maxlength' => 191]) !!}
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

{{-- @include('includes.ckeditor') --}}

@push('script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    // CKEDITOR.replace( 'details' );
        CKEDITOR.replace( 'description', {
            filebrowserUploadUrl: "{{route('ckeditor.image.upload', ['_token' => csrf_token()])}}",
            filebrowserUploadMethod: 'form'
        });
</script>
@endpush
