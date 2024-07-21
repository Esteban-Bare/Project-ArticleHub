@extends('layouts.main')

@section('title', 'Create Article')

@section('content')
<div class="ma-container">
    <h2 class="ma-title">Make your own article!</h2>

    @if ($errors->any())
        <div class="ma-alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('createArticle') }}" method="post">
        @csrf
        <div class="ma-form-group">
            <label for="titre">Title:</label>
            <input type="text" name="titre" id="titre" value="{{ old('titre') }}" required>
        </div>
        <div class="ma-form-group">
            <label for="small_description">Small description:</label>
            <textarea name="small_description" id="small_description">{{ old('small_description') }}</textarea>
        </div>
        <div class="ma-form-group">
            <label for="contenu">Content:</label>
            <textarea name="contenu" id="contenu">{{ old('contenu') }}</textarea>
        </div>
        <div class="ma-form-group">
            <label>Categories:</label>
            @foreach ($categories as $category)
                <div>
                    <input type="checkbox" name="categories[]" id="category{{ $category->id }}" value="{{ $category->id }}">
                    <label for="category{{ $category->id }}">{{ $category->nom }}</label>
                </div>
            @endforeach
        </div>
        <input type="hidden" name="utilisateur_id" id="utilisateur_id" value="{{ session('userId')}}">
        <button type="submit" class="ma-button">Create</button>
    </form>
</div>
@endsection
