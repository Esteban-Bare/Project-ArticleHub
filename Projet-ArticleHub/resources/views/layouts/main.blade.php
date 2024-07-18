<!-- resources/views/layouts/main.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/back-office.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.likeFilledUrl = "{{ asset('images/like-filled.png') }}";
        window.likeUrl = "{{ asset('images/like.png') }}";
    </script>
</head>
<body>
    <!-- Header -->
    @include('partials.header')

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
