<div class='btn-group'>
    @can('Profession-view')
    <a href="{{ route('admin.professions.show', $id) }}" class='btn btn-sm btn-primary'>
        {{ __('View') }}
    </a>
    @endcan
    @can('Profession-update')
    <a href="{{ route('admin.professions.edit', $id) }}" class='btn btn-sm btn-info'>
       {{ __('Edit') }}
    </a>
    @endcan
    @can('Profession-delete')
     <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{$id}}" data-original-title="Delete" class="btn btn-sm btn-danger delete">{{ __('Delete') }}</a>
     @endcan
</div>
