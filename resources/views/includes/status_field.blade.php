<div class="form-group">
    <div class="custom-control custom-switch">
        <input name="status" value="1"
            @if (isset($variable) && $variable->status == 1) checked
            @elseif (!isset($variable))
            checked @endif
            type="checkbox" class="custom-control-input" id="customSwitch1">
        <label class="custom-control-label" for="customSwitch1">{{ __('Status') }}</label>
    </div>
</div>
