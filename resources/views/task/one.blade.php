<x-main-layout>
    <x-slot:title>Задача {{ $task->id }}</x-slot:title>
    <x-slot>
        <div><a href="/tasks">Все задачи</a></div>
        <div class="grid2">
            <div><b>Задача: </b></div>
            <div>{{ $task->title }}</div>
            <div><b>Создана: </b></div>
            <div>{{ date('d.m.Y H:i', $task->createdAt) }}</div>
            <div><b>Дэдлайн: </b></div>
            <div>{{ $task->due?->format('d.m.Y') }}</div>
            @if($task->description !== null)
                <div><b>Описание: </b></div>
                <div>{{ $task->description }}</div>
            @endif
            <div><b>Статус: </b></div>
            <div>{{ $task->status->getName() }}</div>
        </div>
        <a href="/task/edit/{{ $task->id }}">Редактировать задачу</a>
    </x-slot>
</x-main-layout>

