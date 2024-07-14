<!-- resources/views/articles/show.blade.php -->

@extends('layouts.main')

@section('title', $article->titre) <!-- Assuming "titre" is the title of the article -->

@section('content')
    <article>
        <h1>{{ $article->titre }}</h1>
        <p>{{ $article->small_description }}</p>
        <p>{{ $article->contenu }}</p>
        <p>Published on: {{ $article->date_publication }}</p>
        
        <!-- Display categories -->
        <ul>
            @foreach ($article->categories as $category)
                <li>{{ $category->nom }}</li> <!-- Assuming "nom" is the name of the category -->
            @endforeach
        </ul>
        
        <!-- Example for displaying author's name -->
        <p>Author: {{ $article->user->nom }}</p> <!-- Assuming "name" is the name of the user -->
    </article>
@endsection
