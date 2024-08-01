<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Ruta de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Auth::routes();

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    // Prefijo para las rutas de tareas
    Route::prefix('tasks')->name('tasks.')->group(function () {
        // Lista de tareas
        Route::get('/', [TaskController::class, 'index'])->name('index');
        
        // Crear tarea
        Route::get('/create', [TaskController::class, 'create'])->name('create');
        Route::post('/', [TaskController::class, 'store'])->name('store');
        
        // Mostrar tarea individual
        Route::get('/{task}', [TaskController::class, 'show'])->name('show');
        
        // Editar tarea
        Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('edit');
        Route::put('/{task}', [TaskController::class, 'update'])->name('update');
        
        // Marcar tarea como completada
        Route::put('/{task}/complete', [TaskController::class, 'complete'])->name('complete');
        
        // Eliminar tarea
        Route::delete('/{task}', [TaskController::class, 'destroy'])->name('destroy');
    });
});

// Ruta para la página de inicio después de iniciar sesión
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
