<x-main-layout>
    <x-slot:title>Все пользователи</x-slot:title>
    @if (auth()->user()?->roles()->where('name', 'Admin')->exists())
        <x-slot:admin>
            <livewire:assign-role />
        </x-slot:admin>
    @endif
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
