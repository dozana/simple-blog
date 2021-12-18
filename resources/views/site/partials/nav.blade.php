<nav class="navbar navbar-expand-lg navbar-dark navbar-stick-dark" data-navbar="sticky">
    <div class="container">
        <div class="navbar-left">
            <button class="navbar-toggler" type="button">&#9776;</button>
            <a class="navbar-brand" href="{{ route('site.home') }}">
                <img class="logo-dark" src="{{ asset('img/logo-dark.png') }}" alt="logo">
            </a>
        </div>
        <section class="navbar-mobile">
            <span class="navbar-divider d-mobile-none"></span>
            <ul class="nav nav-navbar">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('site.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </section>

        @if (Route::has('login'))
            @auth
                <a href="{{ route('dashboard.index') }}" class="btn btn-xs btn-round btn-success">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-xs btn-danger mr-2">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-xs btn-danger">Register</a>
                @endif
            @endauth
        @endif

    </div>
</nav>
