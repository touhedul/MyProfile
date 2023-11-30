<!-- Name Field -->
<div class="form-group">
    <b>{!! Form::label('name',  __('Name')) !!}</b>
    <p>{{ $profession->name }}</p>
</div>


<!-- Profession Category Id Field -->
<div class="form-group">
    <b>{!! Form::label('profession_category_id',  __('Category ')) !!}</b>
    <p>{{ $profession->profession->category->name }}</p>
</div>


<div class="form-group">
    <b>{!! Form::label('status',  __('Status')) !!}</b>
    @include('includes.status_show',['status'=>$testimonial->status])
</div>

<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at',  __('Created At')) !!}</b>
    <p>{{ myDateFormat($profession->created_at) }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at',  __('Updated At')) !!}</b>
    <p>{{ myDateFormat($profession->updated_at) }}</p>
</div>


