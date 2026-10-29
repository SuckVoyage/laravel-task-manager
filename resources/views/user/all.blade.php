<x-main-layout>
    <x-slot:title>Все пользователи</x-slot:title>

    <h1>Все пользователи</h1>

    <div class="grid2">
        @forelse ($users as $user)
            <div>{{ $user->email }}</div>
            <div>
                @forelse ($user->roles as $role)
                    {{ $role->name }}{{ $loop->last ? '' : ', ' }}
                @empty
                    Нет ролей
                @endforelse
            </div>
        @empty
            <div>Не найдено ни одного пользователя</div>
        @endforelse
    </div>
</x-main-layout>
