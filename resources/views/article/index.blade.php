@extends('layoutDemo')

@section('content')
<h1>Articles</h1>
<h3><a href="{{ route('article_add') }}">新增</a></h3>
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