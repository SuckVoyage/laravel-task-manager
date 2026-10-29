<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::query()->create([
            'title' => 'Сделать домашки',
            'due' => '2026-10-25',
            'user_id' => 3,
            'urgency_id' => 1]);
        Task::query()->create([
            'title' => 'Съездить в магазин',
            'due' => '2026-10-23',
            'user_id' => 2,
            'urgency_id' => 1]);
        Task::query()->create([
            'title' => 'Сделать уборку',
            'due' => '2026-10-23',
            'user_id' => 1,
            'urgency_id' => 1]);
    }
}
