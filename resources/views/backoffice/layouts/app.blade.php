<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice - @yield('title')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">

    <link rel="stylesheet" href="{{ url('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/main/app-dark.css') }}">
    <link rel="stylesheet" href="{{ url('assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ url('assets/images/logo/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ url('assets/css/shared/iconly.css') }}">
    <link rel="stylesheet" href="{{ url('assets/custom.css') }}">

    <link rel="stylesheet" href="{{ url('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/pages/simple-datatables.css') }}">

    <link rel="stylesheet" href="{{ url('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet" href="{{ url('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">
    <link rel="stylesheet" href="{{ url('assets/extensions/toastify-js/src/toastify.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/pages/filepond.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('css')

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    @include('backoffice.layouts.sidebar-header')
                </div>
                <div class="sidebar-menu">
                    @include('backoffice.layouts.sidebar-menu')
                </div>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                @yield('page-heading')
            </div>
            <div class="page-content">
                @yield('content')
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; </p>
                    </div>
                    <div class="float-end">
                        <p>Template by <a href="https://zuramai.github.io/mazer/">Mazer</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ url('assets/js/bootstrap.js') }}"></script>
    <script src="{{ url('assets/js/app.js') }}"></script>
    <script src="{{ url('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ url('assets/js/pages/simple-datatables.js') }}"></script>
    <script src="{{ url('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ url('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ url('assets/js/pages/filepond.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    @yield('script')

</body>

</html>
