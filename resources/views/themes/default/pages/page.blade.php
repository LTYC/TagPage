@extends('themes.default.layout')

@section('title'){{ ucfirst($page->name) }}@stop

@section('content')

    <h1>{{ ucfirst($page->name) }}</h1>

@foreach($page->ancestors()->where('depth', '>', 0)->get() as $d)
    / {{ $d->name }}
@endforeach

    <div class="container">
@foreach($posts as $post)
            <div class="row">
                <div class="col-sm-12">
                    <h2>{{ $post->title }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    {!! $post->body !!}
                </div>
            </div>
@endforeach
    </div>
@stop
