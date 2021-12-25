<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('site.partials.head')
</head>
<body>

@include('site.partials.nav')

<main class="main-content">
    <section class="container">
        @yield('content')
    </section>
</main>

@include('site.partials.footer')

</body>
</html>
