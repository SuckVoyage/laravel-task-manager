@props([
    'action',
    'method' => 'POST',
    'task' => null,
    'submit_label' => 'Сохранить'
])

<form action="{{ $action }}" method="POST" {{ $attributes }}>
    @csrf

    @if (strtoupper($method) !== 'POST')
        @method($method)
    @endif

    <div class="formRow">
        <label for="title">Название задачи</label>

        <input
            id="title"
            name="title"
            type="text"
            value="{{ old('title', $task?->title) }}"
            maxlength="255"
            required
        >

        @error('title')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="formRow">
        <label for="description">Описание</label>

        <textarea
            id="description"
            name="description"
        >{{ old('description', $task?->description) }}</textarea>

        @error('description')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="formRow">
        <label for="due">Срок выполнения</label>

        <input
            id="due"
            name="due"
            type="date"
            value="{{ old('due', $task?->due?->format('Y-m-d')) }}"
            required
        >

        @error('due')
            <p>{{ $message }}</p>
        @enderror
    </div>
    @if ($task !== null)
    <div class="grid3">
        <div>
            <a href="/task/view/ {{ $task->id }}">Назад</a>
        </div>
    @else
        <div class="grid2">
    @endif
        <div>
            <a href="{{ route('tasks.index') }}">Все задачи</a>
        </div>
        <div>
            <button type="submit">{{ $submit_label }}</button>
        @if (strtoupper($method) === 'PUT')
            <form
                action="{{ route('task.delete', $task) }}"
                method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Удалить</button>
            </form>
        @endif
        </div>

    </div>
</form>



