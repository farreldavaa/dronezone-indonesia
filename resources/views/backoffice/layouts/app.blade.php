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
    <link rel="stylesheet" href="{{ url('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet" href="{{ url('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">
    <link rel="stylesheet" href="{{ url('assets/extensions/toastify-js/src/toastify.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/pages/filepond.css') }}">

    @vite(['resources/js/app.js'])

    @yield('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ url('assets/custom.css') }}">
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
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-lg-0">
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">{{ Auth::user()->name }}</h6>
                                            <p class="mb-0 text-sm text-gray-600">{{ Auth::user()->email }}</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{ url('assets/images/faces/1.jpg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Hello, {{ Auth::user()->name }}!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <li><button type="submit" class="dropdown-item"><i
                                            class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</button></li>
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
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
    <script src="{{ url('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ url('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ url('assets/js/pages/filepond.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>

    @yield('script')

</body>

</html>
