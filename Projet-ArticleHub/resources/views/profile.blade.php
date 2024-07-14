<!-- resources/views/articles/index.blade.php -->

@extends('layouts.main')

@section('title', 'Profile')

@section('content')
    <p>Hello {{ $user->nom }}</p>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <a href="/articles/create">Make an article</a>
@endsection