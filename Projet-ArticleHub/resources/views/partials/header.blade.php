<header>
    <div class="header-content">
        <h1><a href="/" class="header-h1">ArticleHub</a></h1>
        <nav>
            @if (session('userId'))
                <a href="/profile">Profile</a>
            @else
                <a href="/auth/create">Registration</a>
                <a href="/login">Login</a>
            @endif
            <a href="/articles">Articles</a>
        </nav>
    </div>
    <div class="search-container">
        <input type="text" id="search" placeholder="Search articles..." onkeyup="searchArticles()">
        <ul id="search-results"></ul>
    </div>
</header>