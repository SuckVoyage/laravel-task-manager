<?php

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    #[Computed]
    public function tasks() : Collection {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        if ($user->roles()->where('name', 'Admin')->exists())
            {
                return Task::all();
            }
        return $user->tasks()->get();
    }
};
?>

<div class="grid3">
     @forelse ($this->tasks as $task)
        <div wire:key="task-{{ $task->id }}-id">
            {{ $task->id }}
        </div>

        <div wire:key="task-{{ $task->id }}-title">
            <a href="{{ route('task.view', $task) }}">
                {{ $task->title }}
            </a>
        </div>

        <div wire:key="task-{{ $task->id }}-due">
            {{ $task->due?->format('d.m.Y') }}
        </div>
    @empty
        <div>Не найдено ни одной задачи</div>
    @endforelse
</div>
