<!-- Name Field -->
<div class="form-group">
    <b>{!! Form::label('name',  __('Name')) !!}</b>
    <p>{{ $menu->name }}</p>
</div>


<div class="form-group">
    <b>{!! Form::label('status',  __('Status')) !!}</b>
    @include('includes.status_show',['status'=>$menu->status])
</div>

<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at',  __('Created At')) !!}</b>
    <p>{{ myDateFormat($menu->created_at) }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at',  __('Updated At')) !!}</b>
    <p>{{ myDateFormat($menu->updated_at) }}</p>
</div>

