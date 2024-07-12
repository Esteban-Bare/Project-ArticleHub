<!-- resources/views/articles/index.blade.php -->

@extends('layouts.main')

@section('title', 'Profile')

@section('content')
    <p>Hello User</p>
    <form action="{{ route('logout')}}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection