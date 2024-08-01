@extends('layouts.template')

@section('title', 'Lista de Tareas')

@section('header')
<header>
    <h1>Lista de Tareas</h1>
    <a href="{{ url('/tasks/create') }}" class="btn">Crear Nueva Tarea</a>
</header>
@endsection

@section('content')
<main>
    @if($tasks->isEmpty())
        <p>No tienes tareas en tu lista.</p>
    @else
        <ul class="task-list">
            @foreach ($tasks as $task)
                <li class="task-item">
                    <div class="task-info">
                        <h2>{{ $task->name }}</h2>
                        <p>{{ $task->description }}</p>
                        <div class="tags">
                            @foreach($task->tags as $tag)
                                <span class="tag">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="task-actions">
                        @if (!$task->completed)
                            <form action="{{ route('tasks.complete', $task) }}" method="POST" style="margin: 0;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn complete-btn">Completar</button>
                            </form>
                        @else
                            <span class="completed">Completada</span>
                        @endif
                        <a href="{{ url('/tasks/' . $task->id) }}" class="btn">Ver Detalles</a>
                        <a href="{{ url('/tasks/' . $task->id . '/edit') }}" class="btn">Editar</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn delete-btn">Eliminar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</main>
@endsection

@section('footer')
<footer>
    <p>&copy; {{ date('Y') }} Mi Aplicación Laravel</p>
</footer>
@endsection
