@extends('layout.demo')

@section('content')
    <h1>创建一篇文章</h1>

    <hr>

    {!! Form::open(['url' => route('article::store')]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('body', 'Body:') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Add article', ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-danger" href="{{ route('article::list') }}">Cancel</a>
        </div>
    {!! Form::close() !!}
@stop