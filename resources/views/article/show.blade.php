@extends('layout.demo')

@section('content')
    <h1>{{ $article->title }}</h1>
    <h4>
        Author: {{ $article->user()->username }} <br>
        Published at：{{ $article->published_at }}
    </h4>
    <article>
        {{ $article->body }}
    </article>

    <hr>
    <back>
        <a href="{{ route('article::list') }}">Go back</a>
    </back>
@stop