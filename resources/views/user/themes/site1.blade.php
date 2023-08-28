@extends('layouts.site')
@section('title','Home')
@section('content')
<h3>{{__('Welcome to my Site')}}</h3>
{{ $userInfo->name }}<br>
{{ $userInfo->email }}<br>
{{ $userInfo->default_theme }}<br>
@endsection
