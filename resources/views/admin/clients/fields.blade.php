<!-- Image Field -->
<div class="form-group" id="imageDiv">
@isset($client)
<img src="{{asset('images/'.$client->image)}}" alt="" srcset="">
@endisset
    <br>
    {!! Form::label('image',  __('Image')) !!}
    {!! Form::file('image',['class' => 'form-control dropify']) !!}
</div>
@include('includes.image_crop_preview')

<!-- Status Field -->
@include('includes.status_field',['variable' => @$client])

<!-- Submit Field -->
<div class="form-group">
    {{ Form::button('<i class="fas fa-plus-circle"></i> '.__('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary ','id' => 'submitBtn'] )  }}
    <a href="{{ route('admin.clients.index') }}" class="btn btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i> {{ __("Cancel") }}</a>
</div>

@include('includes.dropify_push')
@include('includes.image_crop', ['width' => 200, 'height' => 150])
