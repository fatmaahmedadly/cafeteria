<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
  

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
    

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-transparent shadow-sm">
            <div class="container">

@if(isset(Auth::user()->id))
             
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </ul>
                    @if(Auth::user()->id == "1")
                    <ul class="navbar-nav me-auto">
                        <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                    </ul>
                    <ul class="navbar-nav me-auto">
                        <a class="nav-link" href="{{ route('client.index') }}">Users</a>
                    </ul>
                    <ul class="navbar-nav me-auto">
                        <a class="nav-link" href="{{ route('orders.index')}}">Orders</a>
                    </ul>
                    <ul class="navbar-nav me-auto">
                        <a class="nav-link" href="{{ route('ordercart.index')}}">Checkes</a>
                    </ul>
                    @endif()
                    @if(Auth::user()->id !="1")
                    <ul class="navbar-nav me-auto">
                        <a class="nav-link" href="{{ route('category.myorder')}}">Myorders</a>
                    </ul>
                     @endif()

@endif()
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                        <img src="/uploads/images/{{ Auth::user()->profile_picture }}" style="height:50px; width:50px; border-radius: 50px 50px 50px 50px;">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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

<main class="py-4">
            @yield('content')
</main>
</div>

<div>
     @yield('mycontent')
</div>

<div >
    @yield('section1')
</div>

<div >
    @yield('section2')
</div>

<div >
    @yield('section3')
</div>
</body>
</html>
