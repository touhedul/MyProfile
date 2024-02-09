<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('Title')) !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required', 'maxlength' => 191]) !!}
</div>


<!-- Details Field -->
<div class="form-group">
    {!! Form::label('details', __('Details')) !!}
    {!! Form::textarea('details', null, ['class' => 'form-control', 'required', 'maxlength' => 65530]) !!}
</div>


<!-- Image Field -->
@isset($project)
    @php
        $image = $project->image && file_exists(public_path('images/' . $project->image)) ? asset('images/' . $project->image) : defaultImage($project->image);
    @endphp
    <img height="150px" width="auto" src="{{ $image }}" alt="" srcset="">
@endisset

<div class="form-group">
    <br>
    {!! Form::label('image', __('Image')) !!}
    <input type="file" name="image" class="form-control dropify" @if (!isset($project)) required  @endif>
    (800 X 600)
</div>
<div class="clearfix"></div>

@include('includes.status_field', ['variable' => @$project])


<!-- Submit Field -->
<div class="form-group">
    {{ Form::button('<i class="fas fa-plus-circle"></i> ' . __('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary ']) }}
    <a href="{{ route('admin.projects.index') }}" class="btn btn-danger"><i class="fa fa-window-close"
            aria-hidden="true"></i> {{ __('Cancel') }}</a>
</div>

@include('includes.ckeditor_push', ['name' => 'details'])
@include('includes.dropify_push')
