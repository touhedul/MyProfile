<div class='btn-group'>
    @can('Service-view')
    <a href="{{ route('admin.services.show', $id) }}" class='btn btn-sm btn-primary'>
        {{ __('View') }}
    </a>
    @endcan
    @can('Service-update')
    <a href="{{ route('admin.services.edit', $id) }}" class='btn btn-sm btn-info'>
       {{ __('Edit') }}
    </a>
    @endcan
    @can('Service-delete')
     <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{$id}}" data-original-title="Delete" class="btn btn-sm btn-danger delete">{{ __('Delete') }}</a>
     @endcan
</div>
