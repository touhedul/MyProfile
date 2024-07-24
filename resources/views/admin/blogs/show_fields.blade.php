<!-- Title Field -->
<div class="form-group">
    <b>{!! Form::label('title', __('Title')) !!}</b>
    <p>{{ $blog->title }}</p>
</div>


<!-- Details Field -->
<div class="form-group">
    <b>{!! Form::label('details', __('Details')) !!}</b>
    <p>{{ $blog->details }}</p>
</div>


<!-- Image Field -->
<div class="form-group">
    <b>{!! Form::label('image', __('Image')) !!}</b>
    <p>
        <img src="{{ asset('images/' . $blog->image) }}" alt="">
    </p>
</div>


<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at', __('Created At')) !!}</b>
    <p>{{ myDateFormat($blog->created_at) }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at', __('Updated At')) !!}</b>
    <p>{{ myDateFormat($blog->updated_at) }}</p>
</div>
