<!-- Name Field -->
<div class="form-group">
    <b>{!! Form::label('name',  __('Name')) !!}</b>
    <p>{{ $menu->name }}</p>
</div>


<!-- Status Field -->
<div class="form-group">
    <b>{!! Form::label('status',  __('Status')) !!}</b>
    <p>{{ $menu->status }}</p>
</div>


<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at',  __('Created At')) !!}</b>
    <p>{{ $menu->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at',  __('Updated At')) !!}</b>
    <p>{{ $menu->updated_at }}</p>
</div>


