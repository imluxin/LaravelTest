@extends('layout.demo')

@section('content')
<h1>Articles</h1>
<h3 class="text-right"><a class="btn btn-success" href="{{ route('article::create') }}">新增</a></h3>
@foreach($articles as $article)
    <h2>
        <a href="{{ route('article::view', ['id' => $article->id]) }}">
            {{ $article->title }}
        </a>
    </h2>
    <h4>
        Author: {{ $article->user->username }} <br>
        Time: {{ $article->published_at }}
    </h4>
    <article>
        {{ $article->body }}
    </article>
    <action>
        <a href="{{ route('article::edit', ['id' => $article->id]) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('article::delete', ['id' => $article->id]) }}" class="btn btn-danger">Delete</a>
    </action>
    <hr>
@endforeach
@stop