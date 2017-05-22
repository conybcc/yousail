<div>
    填写评论
    <form name="comment_create" action="{{ route('comment.create') }}" method="POST">
        <textarea name="content"></textarea>
        <input type="hidden" name="article" value="{{ $article->id }}" />
        {{ csrf_field() }}
        <input type="submit" />
    </form>
</div>