@extends('layouts.main')

@section('title', 'All Articles')

@section('content')
<div class="all-articles-container">
    <h2>All Articles</h2>
    <a href="{{ route('admin.view') }}">Back-office</a>
    <ul>
        @foreach($articles as $article)
            <li>
                <div class="article-info">
                    <span>{{ $article->titre }}</span>
                    <a href="{{ route('article.show', ['id' => $article->id]) }}" class="read-more-link">Read more</a>
                </div>
                <form action="{{ route('admin.deleteArticle', $article->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
