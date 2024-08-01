<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    public function create()
    {
        $tags = Tag::all(); 
        return view('tasks.create', compact('tags')); 
    }

    public function show(Task $task)
    {
        $this->authorize('view', $task); 

        return view('tasks.show', compact('task'));
    }


    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'tags' => 'nullable|array',
        'tags.*' => 'exists:tags,id'
    ]);

    $task = Task::create([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'user_id' => auth()->id(),
    ]);

    if ($request->has('tags')) {
        $task->tags()->attach($request->input('tags'));
    }

    return redirect()->route('tasks.index')->with('success', 'Tarea creada correctamente.');
}

    public function edit(Task $task)
    {
        // Asegúrate de que el usuario pueda editar la tarea
        $this->authorize('update', $task);

        // Obtén todas las etiquetas disponibles
        $tags = Tag::all();

        // Verifica si $tags no está vacío
        if ($tags->isEmpty()) {
            abort(404, 'No se encontraron etiquetas.');
        }

        // Pasa la tarea y las etiquetas a la vista
        return view('tasks.edit', [
            'task' => $task,
            'tags' => $tags
        ]);
    }


    public function update(Request $request, Task $task)
    {
        // Asegúrate de que el usuario pueda actualizar la tarea
        $this->authorize('update', $task);

        // Valida los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id', // Asegúrate de que las etiquetas existen
        ]);

        // Actualiza la tarea
        $task->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        // Sincroniza las etiquetas (si hay)
        if ($request->has('tags')) {
            $task->tags()->sync($request->input('tags'));
        } else {
            $task->tags()->sync([]);
        }

        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada con éxito.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada correctamente.');
    }

    public function complete(Task $task)
    {
        $this->authorize('complete', $task);

        $task->completed = true;
        $task->save();

        return redirect('/tasks');
    }
}
