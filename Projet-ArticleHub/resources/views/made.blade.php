<!-- resources/views/profile/articles.blade.php -->

@extends('layouts.main')

@section('title', 'Created Articles')

@section('content')
    <h2>Created Articles</h2>
    @foreach ($createdArticles as $article)
        <div class="article-card">
            <h3 class="article-title">{{ $article->title }}</h3>
            <p class="article-description">{{ $article->small_description }}</p>
            <a href="{{ route('article.show', ['id' => $article->id]) }}" class="read-more-link">Read more</a>
            <form action="{{ route('profile.articles.delete', ['id' => $article->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach
@endsection
