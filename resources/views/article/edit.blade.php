@extends('layout.demo')

@section('content')
    <h1>编辑文章</h1>
    <hr>

    {{--{!! Form::model($article, ['url' => route('article::store'), 'method' => 'post']) !!}--}}
    {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}
{{--    {!! Form::model($article, ['method' => 'PATCH', 'action' => route('article::update', ['id' => $article->id])]) !!}--}}

        @include('article._form', ['submitText' => 'Update Article'])

    {!! Form::close() !!}

    @include('errors.list')
@stop