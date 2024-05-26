<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('User Id')) !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control']) !!}
</div>


<!-- Domain Field -->
<div class="form-group">
    {!! Form::label('domain', __('Domain')) !!}
    {!! Form::text('domain', null, ['class' => 'form-control', 'required', 'maxlength' => 100]) !!}
</div>


<!-- Status Field -->
@include('includes.status_field', ['variable' => @$customDomain])


<!-- Is Sub Domain Field -->


<div class="form-group">
    {!! Form::label('is_sub_domain', __('Is Sub Domain')) !!}

    <div class="form-group">
        <div class="custom-control custom-switch">
            <input name="is_sub_domain" value="1"
                @if (isset($customDomain) && $customDomain->is_sub_domain == 1) checked
                @elseif (!isset($customDomain))
                checked @endif
                type="checkbox" class="custom-control-input" id="customSwitch1">
            <label class="custom-control-label" for="customSwitch1">{{ __('is_sub_domain') }}</label>
        </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group">
    {{ Form::button('<i class="fas fa-plus-circle"></i> ' . __('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary ']) }}
    <a href="{{ route('admin.customDomains.index') }}" class="btn btn-danger"><i class="fa fa-window-close"
            aria-hidden="true"></i> {{ __('Cancel') }}</a>
</div>

{{-- @include('includes.ckeditor') --}}
