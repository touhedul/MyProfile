<div class='btn-group'>
    @can('Achievement-view')
    <a href="{{ route('admin.achievements.show', $id) }}" class='btn btn-sm btn-primary'>
        {{ __('View') }}
    </a>
    @endcan
    @can('Achievement-update')
    <a href="{{ route('admin.achievements.edit', $id) }}" class='btn btn-sm btn-info'>
       {{ __('Edit') }}
    </a>
    @endcan
    @can('Achievement-delete')
     <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{$id}}" data-original-title="Delete" class="btn btn-sm btn-danger delete">{{ __('Delete') }}</a>
     @endcan
</div>
