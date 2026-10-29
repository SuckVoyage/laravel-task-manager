<x-main-layout>
    <x-slot:title>Все роли</x-slot:title>
    @if (auth()->user()?->roles()->where('name', 'Admin')->exists())
        <x-slot:admin>
            <livewire:assign-role />
        </x-slot:admin>
    @endif
    <h1>Все роли</h1>

    <div class="grid2">
        @forelse ($roles as $role)
            <div>{{ $role->name }}</div>
            <div>
                @forelse ($role->users as $user)
                    {{ $user->email }}{{ $loop->last ? '' : ', ' }}
                @empty
                    Нет пользователей
                @endforelse
            </div>
        @empty
            <div>Не найдено ни одной роли</div>
        @endforelse
    </div>
</x-main-layout>
