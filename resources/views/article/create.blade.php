@extends('layout.demo')

@section('content')
    <h1>创建一篇文章</h1>
    <hr>

    {!! Form::open(['url' => route('article::store'), 'method' => 'post']) !!}

        @include('article._form', ['submitText' => 'Add Article'])

    {!! Form::close() !!}

    @include('errors.list')
@stop