<!-- resources/views/articles.blade.php -->

@extends('layouts.main')

@section('title', 'Articles')

@section('content')
<h2>Here are all the articles</h2>

<!-- Category select dropdown -->
<form action="{{ route('articles.index') }}" method="GET">
    <label for="category">Sort by Category:</label>
    <select name="category" id="category">
        <option value="">All Categories</option>
        @foreach ($categories as $category)
            <option value="{{ $category->nom }}" {{ $selectedCategory == $category->nom ? 'selected' : '' }}>
                {{ $category->nom }}
            </option>
        @endforeach
    </select>

    <!-- Sorting options -->
    <label for="sort">Sort by:</label>
    <select name="sort" id="sort">
        <option value="newest" {{ $sort == 'newest' ? 'selected' : '' }}>Newest</option>
        <option value="oldest" {{ $sort == 'oldest' ? 'selected' : '' }}>Oldest</option>
        <option value="most-liked" {{ $sort == 'most-liked' ? 'selected' : '' }}>Most Liked</option>
    </select>

    <button type="submit">Apply</button>
</form>

@if ($articles->isEmpty())
    <p>No articles found.</p>
@else
    <div class="article-grid">
        @foreach ($articles as $article)
            <div class="article-item">
                <a href="{{ route('article.show', ['id' => $article->id]) }}">
                    <div class="article-content">
                        <h3>{{ $article->titre }}</h3>
                        <p>{{ $article->small_description }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="pagination">
        {{ $articles->links() }}
    </div>

@endif
@endsection