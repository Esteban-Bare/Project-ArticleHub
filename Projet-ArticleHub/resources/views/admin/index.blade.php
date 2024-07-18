@extends('layouts.main')

@section('title', 'Back-office')

@section('content')
<div class="admin-container">
    <h2>Administrator Page</h2>
    <a href="/profile">Profile</a>
    <ul>
        <li><a href="{{ route('admin.users') }}">View All Users</a></li>
        <li><a href="{{ route('admin.articles') }}">View All Articles</a></li>
    </ul>
</div>
@endsection
