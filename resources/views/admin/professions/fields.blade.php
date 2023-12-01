<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control','required','maxlength' => 191]) !!}
</div>


<!-- Profession Category Id Field -->
<div class="form-group">
    {!! Form::label('profession_category_id',  __('Category')) !!}
    {!! Form::select('profession_category_id', $profession_categoryItems, null, ['class' => 'form-control']) !!}
</div>


<!--MenuField -->
<div class="form-group">
    {!! Form::label('menu_id',  __('Menu')) !!}
    <br>
    @foreach ($menus as $menu)
    <p><input type="checkbox" name="menu_id[]"
        value="{{$menu->id}}"

        @isset($profession)
        @if (in_array($menu->id,$profession->menus->pluck('id')->toArray()))
            checked
        @endif
    @endisset
        > {{$menu->name}}</p>
    @endforeach
</div>


@include('includes.status_field',['variable' => @$profession])


<!-- Submit Field -->
<div class="form-group">
    {{ Form::button('<i class="fas fa-plus-circle"></i> '.__('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary '] )  }}
    <a href="{{ route('admin.professions.index') }}" class="btn btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i> {{ __("Cancel") }}</a>
</div>

{{-- @include('includes.ckeditor') --}}
