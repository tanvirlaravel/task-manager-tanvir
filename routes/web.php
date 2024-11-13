<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

Route::patch('/tasks/{id}/complete', [TaskController::class, 'markAsComplete'])->name('tasks.complete');
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
