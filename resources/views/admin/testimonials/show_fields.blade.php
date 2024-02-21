<!-- Name Field -->
<div class="form-group">
    <b>{!! Form::label('name',  __('Name')) !!}</b>
    <p>{{ $testimonial->name }}</p>
</div>


<!-- Designation Field -->
<div class="form-group">
    <b>{!! Form::label('designation',  __('Designation')) !!}</b>
    <p>{{ $testimonial->designation }}</p>
</div>


<!-- Message Field -->
<div class="form-group">
    <b>{!! Form::label('message',  __('Message')) !!}</b>
    <p>{!! $testimonial->message !!}</p>
</div>


<!-- Image Field -->
{{-- <div class="form-group">
    <b>{!! Form::label('image',  __('Image')) !!}</b>
    @php
        $image = $testimonial->image ? asset('images/'.$testimonial->image) : defaultImage('no_image') ;
    @endphp
    <p><img height="200px" width="auto" src="{{$image}}" alt=""></p>
</div> --}}



<div class="form-group">
    <b>{!! Form::label('status',  __('Status')) !!}</b>
    @include('includes.status_show',['status'=>$testimonial->status])
</div>

<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at',  __('Created At')) !!}</b>
    <p>{{ myDateFormat($testimonial->created_at) }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at',  __('Updated At')) !!}</b>
    <p>{{ myDateFormat($testimonial->updated_at) }}</p>
</div>


