<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', [TaskController::class, 'showall']);

Route::get('/hello', function () {
    return '<h1>hello</h1>';
});
