@extends('layout.demo')



@section('content')
    @include('flash::message')
<h1>Articles</h1>
    <div>
        @foreach($tags as $t)
            <a href="{{ route('tag_article', ['id' => $t->id]) }}">{{ $t->name }}</a>
        @endforeach
    </div>
<h3 class="text-right"><a class="btn btn-success" href="{{ route('article::create') }}">新增</a></h3>
@foreach($articles as $article)
    <h2>
        <a href="{{ route('article::show', ['id' => $article->id]) }}">
            {{ $article->title }}
        </a>
    </h2>
    <h4>
        Author: {{ $article->user->username }} <br>
        Time: {{ $article->published_at }} <br>
        Tags: {{ implode(',', $article->tags->lists('name')->toArray()) }}
    </h4>
    <article>
        {{ $article->body }}
    </article>
    <action>
        <a href="{{ route('article::edit', ['id' => $article->id]) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('article::delete', ['id' => $article->id]) }}" class="btn btn-danger js-delete">Delete</a>
    </action>
    <hr>
@endforeach
    <script type="text/javascript">
        $(document).ready(function(){
            $('#flash-overlay-modal').modal();
            $('.js-delete').click(function(){
                if (!confirm('确定要删除吗？')){
                    return false;
                }
            });
        });
        // $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    </script>
@stop
