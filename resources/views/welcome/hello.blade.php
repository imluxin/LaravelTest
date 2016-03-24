@extends('layout.welcome')

@section('content')
<div class="content">
    <div class="title">Hello @if(isset($name)) {{$name}} @endif</div>
</div>
@stop