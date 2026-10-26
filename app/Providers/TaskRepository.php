<?php

namespace App\Providers;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class TaskRepository
{
    public function getAll(): Collection
    {
        return Task::all();
    }

    public function getById(int $taskId): Task
    {
        return Task::findOrFail($taskId);
    }

    public function insert(array $data)
    {
        DB::insert(
            'INSERT INTO tasks
                (title, description, due, user_id, created_at, updated_at)
            VALUES (?, ?, ?, ?, ?, ?)',
            [
                $data['title'],
                $data['description'] ?? null,
                $data['due'],
                $data['user_id'],
                now(),
                now(),
            ]);
    }

    public function update(array $data, int $id): int
    {
        return DB::update('UPDATE tasks
            SET title = ?,
            description = ?,
            due = ?,
            updated_at = ?
            WHERE id = ?', [
            $data['title'],
            $data['description'] ?? null,
            $data['due'],
            now(),
            $id, ], );
    }

    public function delete(int $id): int
    {
        return DB::delete(
            'DELETE FROM tasks WHERE id = ?',
            [$id]
        );

    }
}
