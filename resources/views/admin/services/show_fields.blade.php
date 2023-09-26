<!-- Title Field -->
<div class="form-group">
    <b>{!! Form::label('title',  __('Title')) !!}</b>
    <p>{{ $service->title }}</p>
</div>


<!-- Description Field -->
<div class="form-group">
    <b>{!! Form::label('description',  __('Description')) !!}</b>
    <p>{{ $service->description }}</p>
</div>


<!-- Icon Field -->
<div class="form-group">
    <b>{!! Form::label('icon',  __('Icon')) !!}</b>
    <p>{{ $service->icon }}</p>
</div>


<!-- Status Field -->
<div class="form-group">
    <b>{!! Form::label('status',  __('Status')) !!}</b>
    <p>{{ $service->status }}</p>
</div>


<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at',  __('Created At')) !!}</b>
    <p>{{ $service->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at',  __('Updated At')) !!}</b>
    <p>{{ $service->updated_at }}</p>
</div>


