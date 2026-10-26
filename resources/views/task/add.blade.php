<x-main-layout>
    <x-slot:title>Добавление задачи</x-slot:title>

    <h1>Добавление задачи</h1>

    <x-task-form
         action="{{route('task.store') }}"
         submit-label="Добавить задачу"
    />
</x-main-layout>
