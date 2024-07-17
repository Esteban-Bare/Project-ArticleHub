@extends('layouts.main')

@section('title', 'Home')

@section('content')
<h2 class="ah-welcome-heading">Welcome to ArticleHub</h2>
<h4 class="ah-subheading">The site where you will find every article you need!</h4>

<h2 class="ah-section-heading">Random Articles</h2>
<div class="ah-article-grid">
    @foreach ($randomArticles as $article)
        <div class="ah-article-item">
            @include('articles.article_card', ['article' => $article])
        </div>
    @endforeach
</div>

<h2 class="ah-section-heading">{{ $category->nom }} Articles</h2>
<div class="ah-article-grid">
    @foreach ($categoryArticles as $article)
        <div class="ah-article-item">
            @include('articles.article_card', ['article' => $article])
        </div>
    @endforeach
</div>

<h2 class="ah-section-heading">Newest Articles</h2>
<div class="ah-article-grid">
    @foreach ($newestArticles as $article)
        <div class="ah-article-item">
            @include('articles.article_card', ['article' => $article])
        </div>
    @endforeach
</div>

<p class="ah-info-text">You want to add your article, login or register if you still don't have an account and do it!</p>
@endsection
