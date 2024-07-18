<!-- resources/views/articles/index.blade.php -->

@extends('layouts.main')

@section('title', 'Profile')

@section('content')
<div class="profile-content">
    <p class="profile-greeting">Hello {{ $user->nom }}</p>

    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
    @if ($user->role === "admin") 
    <form action="{{ route('admin.view') }}" method="get">
        @csrf
        <button type="submit">Back-office</button>
    </form>
    @endif

    <div class="password-change-form">
        <h2>Change Password</h2>
        <form action="{{ route('password.update') }}" method="post">
            @csrf
            <label for="current_password">Current Password:</label>
            <input type="password" id="current_password" name="current_password" required><br><br>
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required><br><br>
            <label for="new_password_confirmation">Confirm New Password:</label>
            <input type="password" id="new_password_confirmation" name="new_password_confirmation" required><br><br>
            <button type="submit">Change Password</button>
        </form>
    </div>

    <ul class="profile-links">
        <li><a href="{{ route('articleCreate') }}">Make an article</a></li>
        <li><a href="{{ route('profile.liked') }}">View Liked Articles</a></li>
        <li><a href="{{ route('profile.articles') }}">View Created Articles</a></li>
    </ul>
</div>
@endsection