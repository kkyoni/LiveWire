<!doctype html>
<html lang="de">
@include('theme.header')

<body>
    <div id="page-container"
        class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
        <nav id="sidebar" aria-label="Main Navigation">
            @include('theme.sidebar')
        </nav>
        @include('theme.navbar')
        <main id="main-container">
            <div class="content">
                @yield('content')
            </div>
        </main>
        @include('theme.footer')
    </div>
    @include('theme.footer_script')
</body>

</html>
