<!doctype html>
<html lang="de">
@include('theme.headerAuth')

<body>
    <div id="page-container">
        <main id="main-container">
            <div class="bg-image" style="background-image: url('../assets/media/photos/photo28@2x.jpg');">
                <div class="row g-0 bg-primary-dark-op">
                    <div class="hero-static col-lg-4 d-none d-lg-flex flex-column justify-content-center">
                        <div class="p-4 p-xl-5 flex-grow-1 d-flex align-items-center">
                            <div class="w-100">
                                <a class="link-fx fw-semibold fs-2 text-white" href="{{ route('login') }}">
                                    FEEI
                                </a>
                                <p class="text-white-75 me-xl-8 mt-2">
                                    {{ __('messages.Welcome to your amazing app. Feel free to login and start managing your projects and clients') }}
                                </p>
                            </div>
                        </div>
                        <div class="p-4 p-xl-5 d-xl-flex justify-content-between align-items-center fs-sm">
                            <p class="fw-medium text-white-50 mb-0">
                                <strong>FEEI</strong> &copy; <span data-toggle="year-copy"></span>
                            </p>
                        </div>
                    </div>
                    @yield('contentAuth')
                </div>
            </div>
        </main>
    </div>
    @include('theme.footer_scriptAuth')
</body>

</html>
