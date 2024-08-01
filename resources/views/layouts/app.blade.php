<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        /* styles.css */

body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
    background: #f4f4f9;
    color: #333;
}

.container {
    width: 90%;
    max-width: 1200px;
    margin: 40px auto;
    padding: 20px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
    box-sizing: border-box;
}

header {
    padding: 20px;
    background: #007bff; /* Color principal */
    color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

header h1 {
    margin: 0;
    font-size: 2.5rem;
    font-weight: 700;
    letter-spacing: 1px;
}

header a {
    color: #fff;
    text-decoration: none;
    margin: 0 15px;
    font-weight: 500;
    border-bottom: 2px solid transparent;
    transition: border-bottom 0.3s ease, transform 0.3s ease;
}

header a:hover {
    border-bottom: 2px solid #fff;
    transform: translateY(-2px);
}

.card {
    border-radius: 12px;
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
}

.card-header {
    background: #007bff;
    color: #fff;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    padding: 20px;
}

.card-body {
    padding: 20px;
}

.form-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-sizing: border-box;
}

.form-check-input {
    margin-top: 0.3rem;
}

.btn {
    display: inline-block;
    padding: 12px 24px;
    margin: 10px 0;
    background: #007bff; /* Color principal */
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.3s ease;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.btn:hover {
    background: #0056b3; /* Color principal más oscuro */
    transform: translateY(-2px);
}

.btn:active {
    transform: translateY(1px);
}

.complete-btn {
    background: #28a745; /* Color para completar */
}

.complete-btn:hover {
    background: #218838;
}

.delete-btn {
    background: #dc3545; /* Color para eliminar */
}

.delete-btn:hover {
    background: #c82333;
}

footer {
    text-align: center;
    padding: 20px;
    background: #007bff; /* Color principal */
    color: #fff;
    border-radius: 12px;
    margin-top: 20px;
    box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
}

footer p {
    margin: 0;
    font-size: 0.9rem;
}

.tags {
    margin-top: 10px;
}

.tag {
    background: #e2e2e2;
    color: #555;
    border-radius: 3px;
    padding: 5px 10px;
    margin-right: 5px;
    display: inline-block;
    font-size: 0.9em;
}

.completed {
    color: #28a745;
    font-weight: bold;
}

/* Agregar Responsive Design */
@media (max-width: 768px) {
    .container {
        width: 95%;
        padding: 10px;
    }

    header h1 {
        font-size: 1.8rem;
    }

    .btn {
        padding: 10px 20px;
        font-size: 0.9rem;
    }

    .form-control {
        padding: 8px;
    }
}

    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
</body>

</html>