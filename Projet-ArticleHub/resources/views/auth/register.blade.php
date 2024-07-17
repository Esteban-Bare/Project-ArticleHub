@extends('layouts.main')

@section('title', 'Register')

@section('content')
<div class="login-form">
    <h1 class="form-heading-create">Register</h1>
    @if (session('success'))
        <div class="alert alert-success-create">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger-create">
            <ul class="error-list-create">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('auth.store') }}" method="POST" class="form-create">
        @csrf
        <div class="form-group-create">
            <label for="username" class="form-label-create">Username:</label>
            <input type="text" id="username" name="username" class="form-control-create" required>
        </div>
        <div class="form-group-create">
            <label for="email" class="form-label-create">Email:</label>
            <input type="email" id="email" name="email" class="form-control-create" required>
        </div>
        <div class="form-group-create">
            <label for="password" class="form-label-create">Password:</label>
            <input type="password" id="password" name="password" class="form-control-create" required>
        </div>
        <div class="form-group-create">
            <label for="password_confirmation" class="form-label-create">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control-create" required>
        </div>
        <button type="submit" class="btn btn-primary btn-register-create">Register</button>
    </form>
</div>
    
@endsection
