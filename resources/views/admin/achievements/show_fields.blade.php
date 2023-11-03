<!-- Title Field -->
<div class="form-group">
    <b>{!! Form::label('title',  __('Title')) !!}</b>
    <p>{{ $achievement->title }}</p>
</div>


<!-- Details Field -->
<div class="form-group">
    <b>{!! Form::label('details',  __('Details')) !!}</b>
    <p>{!! $achievement->details !!}</p>
</div>


<!-- Image Field -->
<div class="form-group">
    <b>{!! Form::label('image',  __('Image')) !!}</b>
    @php
        $image = $project->image ? asset('images/'.$project->image) : defaultImage('no_image') ;
    @endphp
    <p><img height="200px" width="auto" src="{{$image}}" alt=""></p>
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


