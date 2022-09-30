<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
       @if (isset($title))
            {{ $title }}
        @else
            {{ 'User' }}
        @endif 
    </title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('templates/vendor/jquery/jquery-3.6.0.min.js') }}"></script>
    {{-- <script src="{{ asset('templates/vendor/jquery/jquery.min.js') }}"></script> --}}
    {{-- Font Awesome --}}
    <link href="{{ asset('templates/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    {{-- Bootstrap --}}
    {{-- <link href="{{ asset('templates/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"> --}}
    {{-- Owl-Carousel --}}
    <link rel="stylesheet" href="{{ asset('templates/vendor/owlcarousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('templates/vendor/owlcarousel/assets/owl.theme.default.min.css') }}">
    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles Boostrapt -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- My Style -->
    <link href="{{ asset('templates/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('check') ? 'active' : '' }}" href="/check">Checkout</a>
                        </li>
                        @if(Auth::check())
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('home/riwayat') ? 'active' : '' }}" href="/home/riwayat">Riwayat Belanja</a>
                            </li>
                        @endif
                    </ul>
                    <form action="/search">
                        @csrf
                        <ul class="navbar-nav">
                            <div class="input-group nav-item">
                                <input type="text" class="form-control nav-link text-dark" placeholder="Search.." name="keyword">
                                <button class="btn btn-sm btn-danger" type="submit" id="button-addon2">Search</button>
                              </div>
                        </ul>
                    </form>
        
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Jika User sudah login baru muncul keranjang belanja -->
                        {{-- @if(Auth::check()) --}}
                            <li class="nav-item">
                               @php
                                    $jumlah = 0;
                                    if(session('cart')) {
                                        foreach(session('cart') as $id_produk => $produk) {
                                            $jumlah += $produk['quantity'];
                                        }
                                    }
                               @endphp
                                <a class="nav-link {{ Request::is('home/cart') ? 'active' : '' }}" href="{{ url('home/cart') }}"><i class="fas fa-shopping-cart"></i> 
                                    @if(!empty($jumlah))
                                        <span class="badge bg-danger">{{ $jumlah }}</span> 
                                    @else
                                        {{ '' }} 
                                    @endif
                                
                                </a>
                            </li>
                        {{-- @endif --}}
                       
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
        
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('register') ? 'active' : '' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Welcome: {{ Auth::user()->name }}
                                </a>
        
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/user/profile">
                                        Dashboard
                                    </a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    {{-- @include('home.slider') --}}
    
    <main class="container py-3">
        @yield('container')
    </main>

    @include('home.footer')
    

