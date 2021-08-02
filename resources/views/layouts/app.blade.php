<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Menu-Food') }}</title>

    <script src="https://code.jquery.com/jquery-3.6.0.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/Cart.js') }}"></script>
    <script src="{{ asset('js/Order.js') }}"></script>
    <script src="{{ asset('js/findd.js') }}"></script>
    <!-- Scripts Select2 -->
    <script src="{{ asset('js/select2.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Boostrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles Select2 -->
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">


    <!-- JavaScript AlertifyJS -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <style>
        .select2-selection__rendered {
            line-height: 31px !important;
        }

        .select2-container .select2-selection--single {
            height: 35px !important;
        }

        .select2-selection__arrow {
            height: 34px !important;
        }

    </style>

</head>

<body>
    <div id="app">
        <nav class="navbar  navbar-expand-md navbar-dark fixed-top navbar-light shadow-sm"
            style="background-color: #df87c9;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Menu-Food') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="/Cart" class="btn" style="padding: 0;font-size: 1.5rem;">
                                <i class="bi bi-cart"></i>
                                <span class="basket-item-count">
                                    <span class="badge badge-pill red"> 0 </span>
                                </span>
                            </a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">

                                <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}"
                                    style="border: 1px solid #cccccc; border-radius: 5px; width: 39px; height: auto;float:left; margin-right: 7px;">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ url('addRestaurant') }}">
                                        จัดการร้าน
                                    </a>
                                    <a class="dropdown-item" href="{{ url('menu/create') }}">
                                        จัดการเมนูอาหา
                                    </a>
                                    <a class="dropdown-item" href="{{ url('MyOrders') }}">
                                        จัดการคำสั่งซื้อ
                                    </a>

                                    {{-- <a class="dropdown-item" target="_blank" href="{{ url('https://chart.googleapis.com/chart?cht=qr&chl='.url("restaurant/").'&chs=280x280&choe=UTF-8') }}">
                                        โหลด QR Code ของร้าน
                                    </a> --}}

                                    <hr>
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

        <main style="margin-top: 5rem">
            @yield('content')
        </main>
    </div>



    @stack('ajax_crud')
</body>

<script>
    // CSRF Token
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $(document).ready(function() {
        $("#selRest").select2({
            ajax: {
                url: "{{ route('select2') }}",
                type: "get",
                dataType: "json",
                delay: 250,
                data: function(params) {
                    return {
                        search: params.term, // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response,
                    };
                },
                cache: true,
            },
        });
    });
</script>

</html>
