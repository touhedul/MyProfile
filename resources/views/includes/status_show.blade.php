@if ($status)
<div class="mb-2 mr-2 badge badge-success">{{ __('Active')}}</div>
@else
<div class="mb-2 mr-2 badge badge-danger">{{ __('Deactive') }}</div>
@endif
