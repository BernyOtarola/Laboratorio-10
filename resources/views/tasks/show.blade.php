
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Tarea</h1>
    <p><strong>Nombre:</strong> {{ $task->name }}</p>
    <p><strong>Descripción:</strong> {{ $task->description }}</p>
    <a href="{{ route('tasks.index') }}" class="btn btn-primary">Volver a la lista de tareas</a>
</div>
@endsection
