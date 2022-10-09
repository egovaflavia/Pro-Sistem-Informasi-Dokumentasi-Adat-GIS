<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo-mng.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo-mng.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
    {{-- Gis --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
        integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
        integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>

    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <style>
        #map {
            height: 400px;
        }
    </style>
    @stack('head')
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a href="#"><img src="{{ asset('assets/images/logo/logo-mng.png') }}"
                                    style="width: 30px; height: 30px;" alt="Logo"></a>
                            <span class="font-weight-bold">Sistem Informasi Dokumentasi Minangkabau</span>
                        </div>
                        <div class="header-top-right">
                            <div class="dropdown">
                                <a href="#" id="topbarUserDropdown"
                                    class="user-dropdown d-flex align-items-center dropend dropdown-toggle "
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar avatar-md2">
                                        <img src="{{ asset('assets/images/faces/1.jpg') }}" alt="Avatar">
                                    </div>
                                    <div class="text">
                                        <h6 class="user-dropdown-name">{{ auth()->user()->name }}</h6>
                                        <p class="user-dropdown-status text-sm text-muted">{{ ucfirst(
                                            auth()->user()->level) }}
                                        </p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg"
                                    aria-labelledby="topbarUserDropdown">
                                    <li><a class="dropdown-item" href="#">My Account</a></li>
                                    <li><a class="dropdown-item" href="#">Settings</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('backend.logout') }}">Logout</a></li>
                                </ul>
                            </div> <!-- Burger button responsive -->
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar">
                    <div class="container">
                        <ul>
                            <li class="menu-item  ">
                                <a href="{{ route('backend.home') }}" class='menu-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="menu-item  ">
                                <a href="{{ route('backend.berita.index') }}" class='menu-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Berita</span>
                                </a>
                            </li>
                            <li class="menu-item  ">
                                <a href="{{ route('backend.makanan.index') }}" class='menu-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Makanan</span>
                                </a>
                            </li>
                            <li class="menu-item  ">
                                <a href="{{ route('backend.kerajinan.index') }}" class='menu-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Kerajinan</span>
                                </a>
                            </li>
                            <li class="menu-item  ">
                                <a href="{{ route('backend.kesenian.index') }}" class='menu-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Kesenian</span>
                                </a>
                            </li>
                            <li class="menu-item  ">
                                <a href="{{ route('backend.upacara.index') }}" class='menu-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Upacara Adat</span>
                                </a>
                            </li>
                            <li class="menu-item  ">
                                <a href="{{ route('backend.pepatah.index') }}" class='menu-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Petatah - Petitih</span>
                                </a>
                            </li>
                            <li class="menu-item  ">
                                <a href="{{ route('backend.berita.index') }}" class='menu-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Laporan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <div class="content-wrapper container"> @yield('content') </div>
            <footer>
                <div class="container">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2022 &copy; Sistem Informasi Dokumentasi Adat Minangkabau</p>
                        </div>
                        <div class="float-end">
                            <p>Made with <span class="text-danger"><i class="bi bi-heart"></i></span> <a
                                    href="https://saugi.me">egova</a></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @stack('body')
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>

    {{-- <script src="{{ asset('assets/js/app.js') }}"></script> --}}
</body>

</html>
