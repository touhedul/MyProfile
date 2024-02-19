<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('Title')) !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required', 'maxlength' => 191]) !!}
</div>


<!-- Details Field -->
<div class="form-group">
    {!! Form::label('details', __('Details')) !!}
    {!! Form::textarea('details', null, ['class' => 'form-control', 'maxlength' => 65530]) !!}
</div>

<!-- Image Field -->
@isset($achievement)
    @php
        $image = $achievement->image && file_exists(public_path('images/' . $achievement->image)) ? asset('images/' . $achievement->image) : defaultImage($achievement->image);
    @endphp
    <img height="150px" width="auto" src="{{ $image }}" alt="" srcset="">
@endisset
<div class="form-group">
    <br>
    {!! Form::label('image', __('Image')) !!}
    {!! Form::file('image', ['class' => 'form-control dropify']) !!}
    (500 X 600)
</div>
<div class="clearfix"></div>


<!-- Status Field -->

@include('includes.status_field', ['variable' => @$achievement])


<!-- Submit Field -->
<div class="form-group">
    {{ Form::button('<i class="fas fa-plus-circle"></i> ' . __('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary ']) }}
    <a href="{{ route('admin.achievements.index') }}" class="btn btn-danger"><i class="fa fa-window-close"
            aria-hidden="true"></i> {{ __('Cancel') }}</a>
</div>

@include('includes.ckeditor_push', ['name' => 'details'])
@include('includes.dropify_push')
