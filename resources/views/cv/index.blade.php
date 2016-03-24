@extends('app')

@section('content')
    <h1>About me</h1>
    <p>
        name: {{ $name }} <br>
        age: {{ $age }}
    </p>
@stop