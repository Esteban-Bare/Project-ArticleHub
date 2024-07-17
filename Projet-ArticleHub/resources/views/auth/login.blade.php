@extends('layouts.main')

@section('title', 'Login')

@section('content')
<div class="login-form">
    <h1 class="form-heading-login">Login</h1>
    @if (session('success'))
        <div class="alert alert-success-login">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger-login">
            <ul class="error-list-login">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('login') }}" method="POST" class="form-login">
        @csrf
        <div class="form-group-login">
            <label for="email" class="form-label-login">Email:</label>
            <input type="email" id="email" name="email" class="form-control-login" value="{{ old('email') }}" required>
        </div>
        <div class="form-group-login">
            <label for="password" class="form-label-login">Password:</label>
            <input type="password" id="password" name="password" class="form-control-login" required>
        </div>
        <button type="submit" class="btn btn-primary btn-login">Login</button>
    </form>
</div>
@endsection