<!-- Name Field -->
<div class="form-group">
    <b>{!! Form::label('name',  __('Name')) !!}</b>
    <p>{{ $education->name }}</p>
</div>


<!-- Details Field -->
<div class="form-group">
    <b>{!! Form::label('details',  __('Details')) !!}</b>
    <p>{!! $education->details !!}</p>
</div>



<div class="form-group">
    <b>{!! Form::label('status',  __('Status')) !!}</b>
    @include('includes.status_show',['status'=>$education->status])
</div>

<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at',  __('Created At')) !!}</b>
    <p>{{ myDateFormat($education->created_at) }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at',  __('Updated At')) !!}</b>
    <p>{{ myDateFormat($education->updated_at) }}</p>
</div>


