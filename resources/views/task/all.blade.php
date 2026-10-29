<x-main-layout>
    <x-slot:title>Все задачи</x-slot:title>
    <x-slot>
        <h1>Все Задачи</h1>
        <div class="grid3">
            @forelse ($tasks as $task)
                <div>{{ $task->id }}</div>
                <div><a href="/task/view/ {{ $task->id }}">{{ $task->title }}</a></div>
                <div>{{ $task->due?->format('d.m.Y') }}</div>
            @empty
                <div>Не найдено ни одной задачи</div>
            @endforelse
        </div>
        <a href='task/add'>Добавить задачу</a>

        <h1>Сообщения пользователя</h1>
        @forelse (auth()->user()->posts as $post)
            <h3>{{ $post->title }}</h3>
            <div>{{ $post->content}}</div>
        @empty
            <div class="empty">Не найдено ни одного поста</div>
        @endforelse

    </x-slot>

</x-main-layout>

