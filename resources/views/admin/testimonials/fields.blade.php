<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control','required','maxlength' => 191]) !!}
</div>


<!-- Designation Field -->
<div class="form-group">
    {!! Form::label('designation', __('Designation')) !!}
    {!! Form::text('designation', null, ['class' => 'form-control','required','maxlength' => 191]) !!}
</div>


<!-- Message Field -->
<div class="form-group">
    {!! Form::label('message',  __('Message')) !!}
    {!! Form::textarea('message', null, ['class' => 'form-control','required','maxlength' => 65530]) !!}
</div>


<!-- Image Field -->
@isset($testimonial)
@php
$image = $testimonial->image ? asset('images/'.$testimonial->image) : defaultImage('no_image') ;
@endphp
<img height="150px" width="auto" src="{{$image}}" alt="" srcset="">
@endisset
<div class="form-group">
    <br>
    {!! Form::label('image',  __('Image')) !!} (65 X 65)
    {!! Form::file('image',['class' => 'form-control dropify']) !!}
</div>
<div class="clearfix"></div>


<!-- Status Field -->

@include('includes.status_field',['variable' => @$testimonial])

<!-- Submit Field -->
<div class="form-group">
    {{ Form::button('<i class="fas fa-plus-circle"></i> '.__('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary '] )  }}
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i> {{ __("Cancel") }}</a>
</div>

@include('includes.ckeditor_push',['name'=>'message'])
@include('includes.dropify_push')
