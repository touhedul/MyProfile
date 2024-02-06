<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('Title')) !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required', 'maxlength' => 191]) !!}
</div>

<div class="form-group">
    {!! Form::label('percentage', __('Percentage')) !!}
    {!! Form::number('percentage', null, ['class' => 'form-control', 'required', 'min' => 0, 'max' => 100]) !!}
</div>


<!-- Submit Field -->
<div class="form-group">
    {{ Form::button('<i class="fas fa-plus-circle"></i> ' . __('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary ']) }}
    <a href="{{ route('admin.skills.index') }}" class="btn btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i>
        {{ __('Cancel') }}</a>
</div>

{{-- @include('includes.ckeditor') --}}
