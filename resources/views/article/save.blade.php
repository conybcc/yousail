@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <form id="article-form" method="POST">
                标题:
                <input type="input" name="title" value="{{ $title }}">
                <br />
                内容:
                <textarea name="content">{{ $content }}</textarea>
                {{ csrf_field() }}
                <br />
                分类:
                @foreach ($categories as $category)
                    <input type="radio" name="category" value="{{ $category->id }}"
                        @if ($category->id === $category_id)
                            checked="checked"
                        @endif
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
                <br />
                <input type="submit"></input>
            </form>
        </div>
    </div>
@endsection
