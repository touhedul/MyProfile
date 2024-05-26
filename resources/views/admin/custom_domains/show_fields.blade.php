<!-- User Id Field -->
<div class="form-group">
    <b>{!! Form::label('user_id',  __('User Id')) !!}</b>
    <p>{{ $customDomain->user_id }}</p>
</div>


<!-- Domain Field -->
<div class="form-group">
    <b>{!! Form::label('domain',  __('Domain')) !!}</b>
    <p>{{ $customDomain->domain }}</p>
</div>


<!-- Status Field -->
<div class="form-group">
    <b>{!! Form::label('status',  __('Status')) !!}</b>
    <p>{{ $customDomain->status }}</p>
</div>


<!-- Is Sub Domain Field -->
<div class="form-group">
    <b>{!! Form::label('is_sub_domain',  __('Is Sub Domain')) !!}</b>
    <p>{{ $customDomain->is_sub_domain }}</p>
</div>


<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at',  __('Created At')) !!}</b>
    <p>{{ $customDomain->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at',  __('Updated At')) !!}</b>
    <p>{{ $customDomain->updated_at }}</p>
</div>


