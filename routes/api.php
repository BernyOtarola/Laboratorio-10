<?php

use App\Http\Controllers\ApiTaskController;
use Illuminate\Support\Facades\Route;

Route::get('/tasks/list', [ApiTaskController::class, 'list']);
Route::middleware('auth:api')->group(function () {
    Route::get('/tasks', [ApiTaskController::class, 'index']);
    Route::put('/tasks/{task}', [ApiTaskController::class, 'update']);
    Route::delete('/tasks/{task}', [ApiTaskController::class, 'destroy']);
});
