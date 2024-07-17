@extends('layouts.main')

@section('title', 'Liked Articles')

@section('content')
    <div class="liked-articles-container">
        <h2>Liked Articles</h2>
        @foreach ($likedArticles as $article)
            <div class="liked-article-card">
                <h3 class="liked-article-title">{{ $article->titre }}</h3>
                <p class="liked-article-description">{{ $article->small_description }}</p>
                <a href="{{ route('article.show', ['id' => $article->id]) }}" class="liked-read-more-link">Read more</a>
            </div>
        @endforeach
    </div>
@endsection
