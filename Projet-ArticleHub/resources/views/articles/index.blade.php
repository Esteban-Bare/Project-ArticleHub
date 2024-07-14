@extends('layouts.main')

@section('title', 'Articles')

@section('content')
<h2>Here are all the articles</h2>
@if ($articles->isEmpty())
    <p>No articles found.</p>
@else
    @foreach ($articles as $article)
        <div>
            <a href="{{ route('article.show', ['id' => $article->id]) }}">{{ $article->titre }}</a>
        </div>
    @endforeach
@endif
@endsection