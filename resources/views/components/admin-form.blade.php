@props([
    'users' => [],
    'roles' => []
])

<form action="{{ route('users.roles.store') }}" method="POST">
    @csrf
    <label for="user">Пользователь</label>
    <select id="user" name="user_id">
        <option value="">Выберите пользователя</option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->email }}</option>
        @endforeach
    </select>

    <label for="role">Роль пользователя</label>

    <select id="role" name="role_id">
        <option value="">Выберите роль</option>
        @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </select>

    <button type="submit">Добавить роль</button>
</form>
