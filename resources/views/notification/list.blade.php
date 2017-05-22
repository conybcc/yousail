@extends('layouts.app')
@section('content')
<div>
    <ul>
    @foreach ($notifications as $notification)
        <li><a href={{ route('article.detail', ['id' => $notification->source_id]) }} >
            {{ $notification->content }}
        </a></li>
    @endforeach
    </ul>
    {{ $notifications->links() }}
</div>
@endsection