@extends('layout.demo')

@section('content')
    <h1>这是一个测试页</h1>

    <table class="table col-md-5">
        <tr><td>name:</td><td>{{ $name }}</td></tr>
        <tr><td>gender:</td><td>{{ $gender }}</td></tr>
    </table>

    @if(count($interests))
        <div>
            <h3>My interests:</h3>
            <ul>
                @foreach($interests as $i)
                    <li>{{ $i }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <hr>

    <div>
        <a href="{{ route('demos') }}">Go to demo!</a>
    </div>
@stop