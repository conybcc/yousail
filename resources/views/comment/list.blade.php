<div>
    <ul>
    @foreach ($comments as $comment)
        <li>
            {{ $comment->content }}
        </li>
    @endforeach
    </ul>
    {{ $comments->links() }}
</div>