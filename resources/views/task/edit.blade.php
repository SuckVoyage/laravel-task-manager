<x-main-layout>
    <x-slot:title>Редактирование задачи</x-slot:title>

    <div class="addGrid">
        <h1>Редактирование задачи</h1>

        <x-task-form
            :action="route('task.update', $task)"
            method="PUT"
            :task="$task"
            submit-label="Сохранить задачу"
        />
    </div>
</x-main-layout>
