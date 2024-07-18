@extends('layouts.main')

@section('title', 'All Users')

@section('content')
<div class="all-users-container">
    <h2>All Users</h2>
    <a href="{{ route('admin.view') }}">Back-office</a>
    <ul>
        @foreach($users as $user)
            <li>
                <div>{{ $user->nom }} - {{ $user->email }}</div>
                <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
