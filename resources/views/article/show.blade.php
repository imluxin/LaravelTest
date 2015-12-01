@extends('layout.demo')

@section('content')
    <h1>{{ $article->title }}</h1>
    <article>
        {{ $article->body }}
    </article>

    <hr>
    <back>
        <a href="{{ route('article::list') }}">Go back</a>
    </back>
@stop