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
@yield('scripts')
