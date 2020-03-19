@extends('layouts.app')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@section('content')
<div class="contents">
    <div class="content"><a href="{{ action('UrlController@index')}}">URL</a></div>
    <div class="content"><a href="{{ action('GenreController@index')}}">Genre</a></div>
</div>
{{ $json }}
<compile-component></compile-component>
@endsection