<!-- Title Field -->
<div class="form-group">
    <b>{!! Form::label('title',  __('Title')) !!}</b>
    <p>{{ $service->title }}</p>
</div>


<!-- Description Field -->
<div class="form-group">
    <b>{!! Form::label('description',  __('Description')) !!}</b>
    <p>{!! $service->description !!}</p>
</div>


<!-- Icon Field -->
<div class="form-group">
    <b>{!! Form::label('icon',  __('Icon')) !!}</b>
    <p><i class="{!!  $service->icon !!}"></i></p>
</div>


<!-- Status Field -->
<div class="form-group">
    <b>{!! Form::label('status',  __('Status')) !!}</b>
    @if ($service->status)
    <div class="mb-2 mr-2 badge badge-success">{{ __('Active')}}</div>
    @else
    <div class="mb-2 mr-2 badge badge-danger">{{ __('Deactive')}}</div>
    @endif
</div>


<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at',  __('Created At')) !!}</b>
    <p>{{ myDateFormat($service->created_at) }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at',  __('Updated At')) !!}</b>
    <p>{{ myDateFormat($service->updated_at) }}</p>
</div>


