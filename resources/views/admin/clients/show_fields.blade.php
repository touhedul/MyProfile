<!-- Image Field -->
<div class="form-group">
    <b>{!! Form::label('image',  __('Image')) !!}</b>
    <p><img height="200px" width="auto" src="{{$client->image}}" alt=""></p>
</div>


<div class="form-group">
    <b>{!! Form::label('status',  __('Status')) !!}</b>
    @include('includes.status_show',['status'=>$client->status])
</div>

<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at',  __('Created At')) !!}</b>
    <p>{{ myDateFormat($client->created_at) }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at',  __('Updated At')) !!}</b>
    <p>{{ myDateFormat($client->updated_at) }}</p>
</div>



