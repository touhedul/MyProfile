<div class='btn-group'>
    @can('ProfessionCategory-view')
    <a href="{{ route('admin.professionCategories.show', $id) }}" class='btn btn-sm btn-primary'>
        {{ __('View') }}
    </a>
    @endcan
    @can('ProfessionCategory-update')
    <a href="{{ route('admin.professionCategories.edit', $id) }}" class='btn btn-sm btn-info'>
       {{ __('Edit') }}
    </a>
    @endcan
    @can('ProfessionCategory-delete')
     <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{$id}}" data-original-title="Delete" class="btn btn-sm btn-danger delete">{{ __('Delete') }}</a>
     @endcan
</div>
