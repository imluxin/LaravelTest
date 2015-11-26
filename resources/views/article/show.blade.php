@extends('layoutDemo')

@section('content')
    <h1>{{ $article->title }}</h1>
    <article>
        {{ $article->body }}
    </article>

    <hr>
    <back>
        <a href="{{ url('/articles') }}">Go back</a>
    </back>
@stop