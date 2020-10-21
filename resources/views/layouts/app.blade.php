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
    <script src="{{ asset('js/materialize.min.js') }}" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">

    <!-- Ecommerce App CSS -->
    <link rel="stylesheet" href="{{ asset('css/ecommerce.css') }}">

    {{-- Extra Style --}}
    @yield('css')
    {{-- Extra Script --}}
    @yield('js')

</head>
<body>
    <div id="app">
        <nav>
            <div class="container-fluid">
                <header class="blog-header py-5">

                    <div class="row flex-nowrap justify-content-between align-items-center">
                        <div class="col-4 pt-1">
                            <a class="text-muted">
                                Panier
                                <span class="badge badge-pill badge-info text-white">
                                    @auth
                                        {{ auth::user()->order  ? auth::user()->order->count() : 0 }}
                                    @else
                                        0
                                    @endauth

                                </span>
                            </a>
                        </div>
                        <div class="col-4 text-center">
                        <a class="blog-header-logo text-dark" href="{{ route('welcome') }}">🛍️ E-Commerce</a>
                        </div>
                        <div class="col-4 d-flex justify-content-end align-items-center">
                            <a class="text-muted" href="#" aria-label="Search">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
                            </a>
                            @guest
                                <a class="btn btn-sm btn-outline-primary m-1" href="{{ route('login') }}">Se Connecter</a>
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('register') }}"> S Inscrire </a>
                            @else
                                <form action="{{ route('logout') }}" method="post">
                                    <button class="btn btn-sm btn-outline-primary"> Se Déconnecter </button>
                                </form>
                            @endguest
                        </div>
                    </div>
                </header>

                <div class="nav-scroller py-1 mb-2">
                    <nav class="nav d-flex justify-content-center text-center">
                        <a class="p-2 active" href="{{ route('product.index') }}">Lapins</a>
                        <a class="p-2 text-muted" href="#">Poussins</a>
                        <a class="p-2 text-muted" href="#">Poissons</a>
                    </nav>
                </div>

                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('alreadyRegistered'))
                    <div class="alert alert-info text-center">
                        {{ session('alreadyRegistered') }}
                    </div>
                @endif
            </div>
        </nav>

        <main class="container-fluid">
            @yield('content')
        </main>


        <footer class="blog-footer mt-4 ">
            <p>
                <a href="https://getbootstrap.com/">E-elevage</a> - 🛒 Application E-Commerce
            </p>
            <p>
                <a href="#">Revenir en haut</a>
            </p>
        </footer>
    </div>
</body>
</html>
