@extends('layoutDemo')

@section('content')
    <h1>{{ $article->title }}</h1>
    <article>
        {{ $article->body }}
    </article>

    <hr>
    <back>
        <a href="{{ route('article_home') }}">Go back</a>
    </back>
@stop