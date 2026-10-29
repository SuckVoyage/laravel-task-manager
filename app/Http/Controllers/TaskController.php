<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use App\Providers\TaskRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    private TaskRepository $repository;

    public function __construct()
    {
        $this->repository = new TaskRepository;
    }

    public function showAll(Request $request): View
    {
        $user = $request->user();
        $data = [];
        if ($user->roles()->where('name', 'Admin')->exists()){
            $data['tasks'] = Task::all();
            $data['users'] = User::all();
            $data['roles'] = Role::all();
        }
        else{
            $data['tasks'] = $user->tasks()->get();
        }

        $data['posts'] = $user->posts()->with('tags')->get();

        return view('task.all', $data);
    }

    public function showOne(Task $task): View
    {
        $this->authorize('view', $task);

        return view('task.one', ['task' => $task]);
    }

    public function showEdit(Task $task): View
    {
        $this->authorize('update', $task);
        return view('task.edit', ['task' => $task]);
    }

    public function showAddTask(): View
    {
        return view('task.add');
    }

    public function insert(Request $request): RedirectResponse
    {
        $validated = $this->validateRequst($request);
        $validated['user_id'] = $request->user()->id;
        $request->user()->tasks()->create($validated);

        //$this->repository->insert($validated);

        return redirect()->route('tasks.index');
    }

    public function update(Request $request, Task $task): RedirectResponse
    {
        $this->authorize('update', $task);
        $this->repository->getById($task->id);

        $validated = $this->validateRequst($request);
        //$this->repository->update($validated, $id);
        $task->update($validated);

        return redirect()->route('task.view', $task);
    }

    private function validateRequst(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'due' => ['required', 'date_format:Y-m-d'],
        ]);
    }

    public function delete(Task $task) {
        $this->authorize('delete', $task);
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
