<!-- Image Field -->
@isset($client)
<img src="{{asset('images/'.$client->image)}}" alt="" srcset="">
@endisset
<div class="form-group">
    <br>
    {!! Form::label('image',  __('Image')) !!}
    {!! Form::file('image',['class' => 'form-control dropify']) !!}
</div>
<div class="clearfix"></div>

<!-- Status Field -->
@include('includes.status_field',['variable' => @$client])

<!-- Submit Field -->
<div class="form-group">
    {{ Form::button('<i class="fas fa-plus-circle"></i> '.__('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary '] )  }}
    <a href="{{ route('admin.clients.index') }}" class="btn btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i> {{ __("Cancel") }}</a>
</div>

@include('includes.dropify_push')
