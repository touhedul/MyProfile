<!-- company Field -->
<div class="form-group">
    <b>{!! Form::label('company',  __('Company')) !!}</b>
    <p>{{ $experience->company }}</p>
</div>


<!-- Role Field -->
<div class="form-group">
    <b>{!! Form::label('role',  __('Role')) !!}</b>
    <p>{{ $experience->role }}</p>
</div>


<!-- Details Field -->
<div class="form-group">
    <b>{!! Form::label('details',  __('Details')) !!}</b>
    <p>{!! $experience->details !!}</p>
</div>


<!-- Duration Field -->
<div class="form-group">
    <b>{!! Form::label('duration',  __('Duration')) !!}</b>
    <p>{{ $experience->duration }}</p>
</div>


<!-- Year Field -->
<div class="form-group">
    <b>{!! Form::label('year',  __('Year')) !!}</b>
    <p>{{ $experience->year }}</p>
</div>


<div class="form-group">
    <b>{!! Form::label('status',  __('Status')) !!}</b>
    @include('includes.status_show',['status'=>$experience->status])
</div>

<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at',  __('Created At')) !!}</b>
    <p>{{ myDateFormat($experience->created_at) }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at',  __('Updated At')) !!}</b>
    <p>{{ myDateFormat($experience->updated_at) }}</p>
</div>


