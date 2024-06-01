<!-- User Id Field -->
<div class="form-group">
    <b>{!! Form::label('user_id', __('User')) !!}</b>
    <p>{{ $customDomain->user->name }} ({{ $customDomain->user->email }})</p>
</div>


<!-- Domain Field -->
<div class="form-group">
    <b>{!! Form::label('domain', __('Domain')) !!}</b>
    <p>{{ $customDomain->domain }}</p>
</div>


<!-- Status Field -->
<div class="form-group">
    <b>{!! Form::label('status', __('Status')) !!}</b>
    @if ($customDomain->status === null)
        <div class="col-md-2 mb-2 mr-2 badge badge-warning">{{ __('Pending') }}</div>
    @elseif ($customDomain->status == 0)
        <div class="col-md-2 mb-2 mr-2 badge badge-danger">{{ __('Disabled') }}</div>
    @elseif ($customDomain->status == 1)
        <div class="col-md-2 mb-2 mr-2 badge badge-success">{{ __('Active') }}</div>
    @endif
</div>


<!-- Is Sub Domain Field -->
<div class="form-group">
    <b>{!! Form::label('is_sub_domain', __('Is Sub Domain')) !!}</b>
    <p>{{ $customDomain->is_sub_domain ? 'YES' : 'NO' }}</p>
</div>


<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at', __('Created At')) !!}</b>
    <p>{{ myDateFormat($customDomain->created_at) }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at', __('Updated At')) !!}</b>
    <p>{{ myDateFormat($customDomain->updated_at) }}</p>
</div>
