<div class="container">
    <ul>
    @foreach ($articles as $article)
        <li><a href={{ route('article.detail', ['id' => $article->id]) }} >
            {{ $article->title }}
        </a></li>
    @endforeach
    </ul>
</div>

{{ $articles->links() }}