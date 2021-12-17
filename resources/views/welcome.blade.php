<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Blog — Simple Blog</title>
    <link href="{{ asset('css/page.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.scss') }}" rel="stylesheet">
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
    <div class="container">
        <div class="navbar-left">
            <button class="navbar-toggler" type="button">&#9776;</button>
            <a class="navbar-brand" href="/">
                <img class="logo-light" src="{{ asset('img/logo-light.png') }}" alt="logo">
            </a>
        </div>
        <section class="navbar-mobile">
            <span class="navbar-divider d-mobile-none"></span>
            <ul class="nav nav-navbar">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Home</a>
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
                <a href="{{ route('home') }}" class="btn btn-xs btn-round btn-success">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-xs btn-danger mr-2">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-xs btn-danger">Register</a>
                @endif
            @endauth
        @endif

    </div>
</nav>

<header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #150734 0%, #150734 48%, #000 100%);">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>Simple Blog</h1>
                <p class="lead-2 opacity-90 mt-6">Content Management System</p>
            </div>
        </div>
    </div>
</header>

<main class="main-content">
    <div class="section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xl-9">
                    <div class="row gap-y">
                        @foreach($posts as $post)
                            <div class="col-md-6">
                                <div class="card border hover-shadow-6 mb-6 d-block">
                                    <a href="#"><img class="card-img-top" src="{{ asset('/storage/'.$post->image) }}" alt="Card image cap"></a>
                                    <div class="p-6 text-center">
                                        <p>
                                            <a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">
                                                {{ $post->category->title }}
                                            </a>
                                        </p>
                                        <h5 class="mb-0">
                                            <a class="text-dark" href="#">
                                                {{ $post->title }}
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <nav class="flexbox mt-30">
                        <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
                        <a class="btn btn-white" href="#">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>
                    </nav>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="sidebar px-4 py-md-0">

                        <h6 class="sidebar-title">Search</h6>

                        <form class="input-group" target="#" method="GET">
                            <input type="text" class="form-control" name="s" placeholder="Search" />
                            <div class="input-group-addon">
                                <span class="input-group-text"><i class="ti-search"></i></span>
                            </div>
                        </form>

                        <hr>

                        <h6 class="sidebar-title">Categories</h6>
                        <div class="row link-color-default fs-14 lh-24">
                            @foreach($categories as $category)
                                <div class="col-6"><a href="#">{{ $category->title }}</a></div>
                            @endforeach
                        </div>

                        <hr>

                        <h6 class="sidebar-title">Top posts</h6>
                        @foreach($posts as $post)
                            <a class="media text-default align-items-center mb-5" href="#">
                                <img class="rounded w-65px mr-4" src="{{ asset('/storage/'.$post->image) }}">
                                <p class="media-body small-2 lh-4 mb-0">{{ $post->description }}</p>
                            </a>
                        @endforeach


                        <hr>

                        <h6 class="sidebar-title">Tags</h6>
                        <div class="gap-multiline-items-1">
                            @foreach($tags as $tag)
                                <a class="badge badge-secondary" href="#">{{ $tag->title }}</a>
                            @endforeach
                        </div>

                        <hr>

                        <h6 class="sidebar-title">About</h6>
                        <p class="small-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad architecto aspernatur assumenda, deleniti dicta in ipsam minus, molestias odit quae qui quis sequi similique suscipit voluptate! Consequuntur placeat reiciendis ut.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="footer">
    <div class="container">
        <div class="row gap-y align-items-center">

            <div class="col-6 col-lg-3">
                <a href="#"><img src="{{ asset('img/logo-dark.png') }}" alt="logo"></a>
            </div>

            <div class="col-6 col-lg-3 text-right order-lg-last">
                <div class="social">
                    <a class="social-git" href="https://github.com/dozana"><i class="fa fa-github"></i></a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
                    <a class="nav-link" href="#">Home</a>
                    <a class="nav-link" href="#">About</a>
                    <a class="nav-link" href="#">Contact</a>
                </div>
            </div>

        </div>
    </div>
</footer>

<script src="{{ asset('js/page.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
