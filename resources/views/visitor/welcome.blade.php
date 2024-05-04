<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MANIAC XIII</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    {{-- font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="icon" href="{{ asset('asset2024') }}/maniac13-pp-rounded.png" type="image/png">

    <style>
        #navbarNav {
            justify-content: end;
        }

        body {
            background-image: url("{{ asset('asset2024/bg-home.png') }}") !important;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: top center;
        }

        p {
            font-family: 'Montserrat';
        }

        .container-fluid {
            background-color: transparent;
        }

        .dropDownMenu {
            z-index: 1000;
            display: block;
        }

        .navbar {
            background-color: #620706 !important;
        }

        .bg-red {
            background-color: #620706 !important;
        }

        .container-bottom-home {
            position: absolute;
            bottom: 100px;
        }

        .bottom-web-home {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: -1;
        }

        .dropdown-item,
        .nav-link {
            font-weight: 600;
            font-family: "Montserrat";
        }

        .navbar-nav {
            gap: 8px;

        }

        .icon {
            width: 15px;
            height: auto;
        }
    </style>
    @yield('styles')

</head>

<body class="antialiased overflow-x-hidden">
    @if (Route::has('login'))
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="logo">
                    <img src="{{ asset('asset2024/logo-maniac.jpg') }}" width="50px" height="50px" alt="logo-maniac"
                        style="border-radius: 50%;">
                    <img src="{{ asset('asset2024/logo-ubaya.png') }}" width="50px" height="50px" alt="logo-ubaya"
                        style="border-radius: 50%;">
                </div>

                <!-- Toggle button for small screens -->
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-list text-white" style="transform: scale(1.2)" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                    </svg>
                </button>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse ms-auto" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('index') }}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('visitor.about') }}">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('visitor.competition') }}">COMPETITION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('visitor.faq') }}">FAQ</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ asset('asset2024/main/guidebook.pdf') }}"
                                download="Guidebook MANIAC XIII.pdf">GUIDEBOOK</a>
                        </li>
                        <li>
                            <div class="dropdown">
                                <button style="background-color: #7f4c42;"
                                    class="btn btn-secondary nav-link dropdown-toggle text-center" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <strong><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                            <path fill-rule="evenodd"
                                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                        </svg>&nbsp;ACCOUNT</strong>
                                </button>
                                <ul class="dropdown-menu">
                                    @auth
                                        @php
                                            $endpoint = '';
                                            switch (\Illuminate\Support\Facades\Auth::user()->role) {
                                                case 'participant':
                                                    $endpoint = '/team';
                                                    break;
                                                case 'acara':
                                                    $endpoint = '/acara';
                                                    break;
                                                case 'si':
                                                    $endpoint = '/si';
                                                    break;
                                                case 'supersi':
                                                    $endpoint = '/supersi';
                                                    break;
                                                case 'admin':
                                                    $endpoint = '/admin';
                                                    break;
                                                case 'judge':
                                                    $endpoint = '/judge';
                                                    break;
                                                default:
                                                    $endpoint = '/penpos';
                                                    break;
                                            }
                                        @endphp
                                        <li>
                                            <a href="{{ url($endpoint) }}"
                                                style="font-size: 1rem !important; letter-spacing: 1px !important;"
                                                class="dropdown-item text-white">Dashboard</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('logout') }}" method="POST" id="logout">
                                                @csrf
                                                <button class="btn-logout dropdown-item text-white"
                                                    style="font-size: 1rem !important; letter-spacing: 1px !important;"
                                                    type="submit">Logout</button>
                                            </form>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ route('login') }}" class="dropdown-item text-white">LOGIN</a>
                                        </li>
                                        @if (Route::has('register'))
                                            <li>
                                                <a href="{{ route('register') }}"
                                                    class="dropdown-item text-white">REGISTER</a>
                                            </li>
                                        @endif
                                    @endauth
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Offcanvas menu -->
        <div class="offcanvas offcanvas-start bg-red" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h4 class="offcanvas-title text-white" id="offcanvasNavbarLabel" style="font-family: 'cinzel'">MANIAC
                    XIII</h4>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <!-- Offcanvas menu links -->
                <ul class="navbar-nav">
                    <li class="nav-item offcanvas-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('index') }}">HOME</a>
                    </li>
                    <li class="nav-item offcanvas-item">
                        <a class="nav-link" href="{{ route('visitor.about') }}">ABOUT US</a>
                    </li>
                    <li class="nav-item offcanvas-item">
                        <a class="nav-link" href="{{ route('visitor.competition') }}">COMPETITION</a>
                    </li>
                    <li class="nav-item offcanvas-item">
                        <a class="nav-link" href="{{ route('visitor.faq') }}">FAQ</a>
                    </li>
                    <li>
                        <a class="nav-link text-white offcanvas-item"
                            href="{{ asset('asset2024/main/guidebook.pdf') }}"
                            download="Guidebook MANIAC XIII.pdf">GUIDEBOOK</a>

                    </li>
                    <li>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle text-white offcanvas-item" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #7f4c42;">
                                ACCOUNT
                            </button>
                            <ul class="dropdown-menu btn-secondary">
                                @auth
                                    @php
                                        $endpoint = '';
                                        switch (\Illuminate\Support\Facades\Auth::user()->role) {
                                            case 'participant':
                                                $endpoint = '/team';
                                                break;
                                            case 'acara':
                                                $endpoint = '/acara';
                                                break;
                                            case 'si':
                                                $endpoint = '/si';
                                                break;
                                            case 'supersi':
                                                $endpoint = '/supersi';
                                                break;
                                            case 'admin':
                                                $endpoint = '/admin';
                                                break;
                                            case 'judge':
                                                $endpoint = '/judge';
                                                break;
                                            default:
                                                $endpoint = '/penpos';
                                                break;
                                        }
                                    @endphp
                                    <li>
                                        <a href="{{ url($endpoint) }}"
                                            style="font-size: 1rem !important; letter-spacing: 1px !important;"
                                            class="dropdown-item text-white">Dashboard</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" id="logout">
                                            @csrf
                                            <button class="btn-logout dropdown-item text-white"
                                                style="font-size: 1rem !important; letter-spacing: 1px !important;"
                                                type="submit">Logout</button>
                                        </form>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('login') }}" class="dropdown-item text-white">LOGIN</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li>
                                            <a href="{{ route('register') }}"
                                                class="dropdown-item text-white">REGISTER</a>
                                        </li>
                                    @endif
                                @endauth
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    @endif
    <main class="position-relative">
        @yield('content')
        <span class="d-block" style="height: 7rem;"></span>
        <img src="{{ asset('asset2024/bg-home-bawah.png') }}" class="bottom-web-home position-absolute">
    </main>

    <footer class="w-100 bg-red pt-2">
        <div class="container-fluid px-4">
            <div class="row">
                <h3 class="text-white d-block" style="font-family: 'cinzel';">MANIAC XIII</h3>
                <div class="col-lg-4 col-sm-12">
                    <a class="link link-hover text-white">Jl. Raya Kalirungkut, Kali Rungkut, Kec. Rungkut, Surabaya,
                        Jawa Timur</a>
                    <div class="maps py-3">
                        <iframe class="w-75"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.3031802459786!2d112.76553161057895!3d-7.319800892657786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fae3f29c4665%3A0x7536c23b4453a79!2sUniversity%20of%20Surabaya!5e0!3m2!1sen!2sid!4v1709278257216!5m2!1sen!2sid"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h6 class="text-white"><strong>SOCIAL MEDIA</strong></h6>
                    <div class="grid gap-4">
                        <p class="text-white">
                            <img class="icon" src="{{ asset('asset2024/footer/IG.png') }}" alt="instagram">
                            @maniac_ubaya
                        </p>
                        <p class="text-white">
                            <img class="icon" src="{{ asset('asset2024/footer/line.png') }}" alt="line">
                            @994nxsfr
                        </p>
                        <p class="text-white">
                            <img class="icon" src="{{ asset('asset2024/footer/email.png') }}" alt="email">
                            @maniac.ubayaa@gmail.com
                        </p>
                        <p class="text-white">
                            <img class="icon" src="{{ asset('asset2024/footer/tiktok.png') }}" alt="tiktok">
                            @maniac_ubaya
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="col-lg-2">
                        <h6 class="text-white pt-sm-3"><strong>SPONSORED BY</strong></h6>

                    </div>
                </div>
                <br>
                <br>
                <p class="text-white text-end pe-5 pb-3">&#169; Developed by MANIAC XIII Committee </p>
            </div>

    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    @yield('script')
</body>


</html>
