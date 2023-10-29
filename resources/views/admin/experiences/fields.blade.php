<!-- company Field -->
<div class="form-group">
    {!! Form::label('company', __('Company')) !!}
    {!! Form::text('company', null, ['class' => 'form-control','required','maxlength' => 191]) !!}
</div>


<!-- Role Field -->
<div class="form-group">
    {!! Form::label('role', __('Role')) !!}
    {!! Form::text('role', null, ['class' => 'form-control','required','maxlength' => 191]) !!}
</div>


<!-- Details Field -->
<div class="form-group">
    {!! Form::label('details',  __('Details')) !!}
    {!! Form::textarea('details', null, ['class' => 'form-control','required','maxlength' => 65530]) !!}
</div>


<!-- Duration Field -->
<div class="form-group">
    {!! Form::label('duration', __('Duration')) !!}
    {!! Form::text('duration', null, ['class' => 'form-control','required','maxlength' => 191]) !!}
</div>


<!-- Year Field -->
<div class="form-group">
    {!! Form::label('year',  __('Year')) !!}
    {!! Form::number('year', null, ['class' => 'form-control','required']) !!}
</div>

@include('includes.status_field',['variable' => @$experience])

<!-- Submit Field -->
<div class="form-group">
    {{ Form::button('<i class="fas fa-plus-circle"></i> '.__('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary '] )  }}
    <a href="{{ route('admin.experiences.index') }}" class="btn btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i> {{ __("Cancel") }}</a>
</div>

@include('includes.ckeditor_push',['name'=>'details'])
