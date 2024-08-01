<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ApiTaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['list']);
    }

    public function list()
    {
        $tasks = Task::select('id', 'name')->get();
        return response()->json($tasks, Response::HTTP_OK);
    }

    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return response()->json($tasks, Response::HTTP_OK);
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $task->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        if ($request->has('tags')) {
            $task->tags()->sync($request->input('tags'));
        } else {
            $task->tags()->sync([]);
        }

        return response()->json([
            'message' => 'Tarea actualizada con éxito.',
            'task' => $task
        ], Response::HTTP_OK);
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();

        return response()->json([
            'message' => 'Tarea eliminada correctamente.'
        ], Response::HTTP_OK);
    }
}
