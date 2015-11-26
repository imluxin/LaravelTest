@extends('layoutDemo')

@section('content')
<h1>Articles</h1>
@foreach($articles as $article)
    <h2>
        <a href="{{ action('ArticlesController@show', array('id' => $article->id), true) }}">
            {{ $article->title }}
        </a>
    </h2>
    <article>
        {{ $article->body }}
    </article>
@endforeach
@stop