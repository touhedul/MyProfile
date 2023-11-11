<!-- Link Field -->
<div class="form-group">
    <b>{!! Form::label('link',  __('Link')) !!}</b>
    <p>{{ $social->link }}</p>
</div>


<!-- Icon Field -->
<div class="form-group">
    <b>{!! Form::label('icon',  __('Icon')) !!}</b>
    <p><i class="{!!  $social->icon !!}"></i></p>
</div>


<div class="form-group">
    <b>{!! Form::label('status',  __('Status')) !!}</b>
    @include('includes.status_show',['status'=>$social->status])
</div>

<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at',  __('Created At')) !!}</b>
    <p>{{ myDateFormat($social->created_at) }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at',  __('Updated At')) !!}</b>
    <p>{{ myDateFormat($social->updated_at) }}</p>
</div>


