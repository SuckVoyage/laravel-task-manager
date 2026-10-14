<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private readonly array $tasks;

    public function __construct()
    {
        $tasks = [];
        array_push($tasks, Task::create(1, 'сделать домашки', time() + 86400));
        array_push($tasks, Task::create(2, 'приготовить ужин', time() + 86400));
        array_push($tasks, Task::create(3, 'поспать', time() + 86400));
        $this->tasks = $tasks;
    }

    public function showAll(){
        return view('showTasks', ['tasks' => $this->tasks]);
    }
}
