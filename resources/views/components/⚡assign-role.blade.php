<?php

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
    public string $userId = '';
    public string $roleId = '';

    #[Computed]
    public function users(): Collection
    {
        return User::all();
    }

    #[Computed]
    public function roles(): Collection
    {
        return Role::all();
    }

    public function save(): void
    {
        /** @var User|null $currentUser */
        $currentUser = Auth::user();

        if (
            $currentUser === null
            || ! $currentUser->roles()->where('name', 'Admin')->exists()
        ) {
            abort(403);
        }

        $validated = $this->validate([
            'userId' => ['required', 'integer', 'exists:users,id'],
            'roleId' => ['required', 'integer', 'exists:roles,id'],
        ]);

        $selectedUser = User::findOrFail($validated['userId']);

        $selectedUser->roles()->syncWithoutDetaching([
            $validated['roleId'],
        ]);

        $this->reset('userId', 'roleId');

        session()->flash('success', 'Роль назначена.');
    }
};
?>

<form wire:submit="save">
    <label for="user">Пользователь</label>
    <select id="user" wire:model="userId">
        <option value="">Выберите пользователя</option>
        @foreach ($this->users as $user)
            <option
                value="{{ $user->id }}"
                wire:key="assign-user-{{ $user->id }}">
                {{ $user->email }}
            </option>
        @endforeach
    </select>

    <label for="role">Роль пользователя</label>

    <select id="role" wire:model="roleId">
        <option value="">Выберите роль</option>
        @foreach ($this->roles as $role)
            <option
                value="{{ $role->id }}"
                wire:key="assign-role-{{ $role->id }}">
                {{ $role->name }}
            </option>
        @endforeach
    </select>

    @error('userId')
        <p>{{ $message }}</p>
    @enderror

    @error('roleId')
        <p>{{ $message }}</p>
    @enderror

    @if (session()->has('success'))
        <p>{{ session('success') }}</p>
    @endif

    <button type="submit">Добавить роль</button>
</form>

