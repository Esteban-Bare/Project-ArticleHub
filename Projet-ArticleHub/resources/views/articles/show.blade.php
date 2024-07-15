@extends('layouts.main')

@section('title', $article->titre)

@section('content')
<div class="article-container">
    <div class="article-header">
        <h1>{{ $article->titre }}</h1>
        <div class="article-meta">
            <p>Published on: {{ $article->date_publication }}</p>
            <p>Author: {{ $article->user->nom }}</p>
        </div>
    </div>
    
    <p>{{ $article->small_description }}</p>
    <p>{{ $article->contenu }}</p>
    
    <!-- Display categories -->
    <ul>
        @foreach ($article->categories as $category)
            <li>{{ $category->nom }}</li>
        @endforeach
    </ul>

    <div class="like-section">
        <img src="{{ $article->userHasLiked(session('userId')) ? asset('images/like-filled.png') : asset('images/like.png') }}"
            alt="Like" class="like-button" data-article-id="{{ $article->id }}">
        <p>{{ $article->likes->count() }} {{ Str::plural('like', $article->likes->count()) }}</p>
    </div>

    <hr>

    <div class="comments-section">
        <h2>Comments</h2>
        @if ($article->commentaires->count() > 0)
            <div>
                @foreach ($article->commentaires as $comment)
                    <div class="comment">
                        <h4>By {{ $comment->user->nom }} on {{ $comment->date_publication }}</h4>
                        <p>{{ $comment->contenu }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p>No comments yet</p>
        @endif

        <h3>Add a comment</h3>
        @if (session('userId'))
            <form action="{{ route('article.comment', ['id' => $article->id]) }}" method="post">
                @csrf
                <div>
                    <label for="content">Content:</label>
                    <textarea name="content" id="content" required>{{ old('content') }}</textarea>
                </div>
                <button type="submit">Submit</button>
            </form>
        @else
            <p>Please <a href="{{ route('login') }}">login</a> to add a comment.</p>
        @endif
    </div>
</div>
@endsection
