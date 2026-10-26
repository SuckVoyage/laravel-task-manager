<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// Route::post('/logout', [AuthController::class, 'logout']);
// Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
// Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
// Route::get('/verify', [AuthController::class, 'showVerify'])->name('verify');

Route::middleware('auth')->group(function (): void {
    Route::get('/tasks', [TaskController::class, 'showAll'])->name('tasks.index');
    Route::get('/task/add', [TaskController::class, 'showAddTask']);
    Route::get('/task/view/{task}', [TaskController::class, 'showOne'])->name('task.view');
    Route::get('/task/edit/{task}', [TaskController::class, 'showEdit']);
    Route::post('/task/insert', [TaskController::class, 'insert'])->name('task.store');
    Route::put('/task/update/{task}', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/task/delete/{task}', [TaskController::class, 'delete'])->name('task.delete');
});
