@extends('layouts.template')

@section('title', 'Inicio')

@section('header')
<header>
    <h1>Bienvenido, {{ Auth::user()->name }}!</h1>
    <nav>
        <ul>
            <li><a href="{{ url('/tasks') }}">Ver Tareas</a></li>
            <li><a href="{{ url('/tasks/create') }}">Crear Nueva Tarea</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn">Cerrar Sesión</button>
                </form>
            </li>
        </ul>
    </nav>
</header>
@endsection

@section('content')
<main>
    <h2>Panel de Control</h2>
    <p>Desde aquí puedes gestionar tus tareas, crear nuevas tareas y ver tus tareas existentes.</p>
</main>
@endsection

@section('footer')
<footer>
    <p>&copy; {{ date('Y') }} Mi Aplicación Laravel</p>
</footer>
@endsection
