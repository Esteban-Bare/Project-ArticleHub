<!-- resources/views/partials/header.blade.php -->

<header>
    <h1>ArticleHub</h1>
    <a href="/">home</a></br>
    @if (session('userEmail')) 
        <a href="/profile">profile</a></br>
    @else
        <a href="/auth/create">Registration</a></br>
        <a href="/login">Login</a></br>
    @endif
</header>
