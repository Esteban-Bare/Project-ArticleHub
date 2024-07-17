<div class="ah-article-card">
    <h3 class="ah-article-title">{{ $article->titre }}</h3>
    <p class="ah-article-description">{{ $article->small_description }}</p>
    <a href="{{ route('article.show', ['id' => $article->id]) }}" class="ah-read-more-link">Read more</a>
</div>
