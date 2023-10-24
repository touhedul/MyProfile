<!-- Title Field -->
<div class="form-group">
    <b>{!! Form::label('title',  __('Title')) !!}</b>
    <p>{{ $course->title }}</p>
</div>


<!-- Details Field -->
<div class="form-group">
    <b>{!! Form::label('details',  __('Details')) !!}</b>
    <p>{!! $course->details !!}</p>
</div>

<div class="form-group">
    <b>{!! Form::label('status',  __('Status')) !!}</b>
    @include('includes.status_show',['status'=>$course->status])
</div>

<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at',  __('Created At')) !!}</b>
    <p>{{ myDateFormat($course->created_at) }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at',  __('Updated At')) !!}</b>
    <p>{{ myDateFormat($course->updated_at) }}</p>
</div>


