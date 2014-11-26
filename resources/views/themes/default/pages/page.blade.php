@extends('themes.default.layout')

@section('title'){{ ucfirst($page->perma_link) }}@stop

@section('content')
    <h1>{{ ucfirst($page->perma_link) }}</h1>
@stop
