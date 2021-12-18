<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.partials.head')
</head>
<body>

<div id="app">
    @include('admin.partials.nav')
    <main class="py-4">
        @auth
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-4">
                        @include('admin.partials.sidebar')
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-8">

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif

                        @yield('content')
                    </div>
                </div>
            </div>
        @else
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        @endauth
    </main>
</div>

@include('admin.partials.footer')

</body>
</html>
