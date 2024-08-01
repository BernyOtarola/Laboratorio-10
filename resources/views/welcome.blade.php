@extends('layouts.template')

@section('title', 'Bienvenido')

@section('header')
<header>
    <h1>Bienvenido a la Aplicación de Tareas</h1>
    @auth
        <p>Hola, {{ Auth::user()->name }}!</p>
        <a href="{{ url('/tasks') }}" class="btn">Ver Tareas</a>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn">Cerrar Sesión</button>
        </form>
    @else
        <p><a href="{{ route('login') }}" class="btn">Iniciar sesión</a> o <a href="{{ route('register') }}" class="btn">registrarse</a>.</p>
    @endauth
</header>
@endsection

@section('content')
<main>
    <h2>¡Comienza a gestionar tus tareas!</h2>
    <p>Para comenzar, <a href="{{ url('/tasks/create') }}" class="btn">crea una nueva tarea</a>.</p>
</main>
@endsection

@section('footer')
<footer>
    <p>&copy; {{ date('Y') }} Mi Aplicación Laravel</p>
</footer>
@endsection
