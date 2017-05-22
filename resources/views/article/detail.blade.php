@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
                标题: <span>{{ $article->title }}</span>
                <br />
                内容: <p>{{ $article->content }}</p>
                <br />
                分类: {{ $category }}
        </div>
        @if ($isAuthor)
            <a href="{{ route('article.save.show', ['id' => $article->id]) }}">编辑</a>
            <a href="{{ route('article.delete', ['id' => $article->id]) }}">删除</a>
        @endif
    </div>
@endsection
