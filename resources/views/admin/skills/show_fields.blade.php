<!-- Title Field -->
<div class="form-group">
    <b>{!! Form::label('title',  __('Title')) !!}</b>
    <p>{{ $skill->title }}</p>
</div>


<!-- Percentage Field -->
<div class="form-group">
    <b>{!! Form::label('percentage',  __('Percentage')) !!}</b>
    <p>{{ $skill->percentage }}</p>
</div>


<!-- Created At Field -->
<div class="form-group">
    <b>{!! Form::label('created_at',  __('Created At')) !!}</b>
    <p>{{ myDateFormat($skill->created_at) }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group">
    <b>{!! Form::label('updated_at',  __('Updated At')) !!}</b>
    <p>{{ myDateFormat($skill->updated_at) }}</p>
</div>


