@props([
    'action',
    'submit_label' => 'Войти',
    'mode' => 'login'
])

<form action="{{ $action }}" method="POST" {{ $attributes }}>
    @csrf

    @if ($mode !== 'login')
        <div>
            <label for="name">Имя</label>
            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name') }}"
                autocomplete="name"
                required
            >

            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>
    @endif

    <div>
        <label for="email">Email</label>
        <input
            id="email"
            name="email"
            type="email"
            value="{{ old('email') }}"
            autocomplete="username"
            required
        >

        @error('email')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password">Пароль</label>
        <input
            id="password"
            name="password"
            type="password"
            autocomplete="{{ $mode !== 'login' ? 'new-password' : 'current-password' }}"
            required
        >

        @error('password')
            <p>{{ $message }}</p>
        @enderror
    </div>

    @if ($mode !== 'login')
        <div>
            <label for="password_confirmation">Повторите пароль</label>
            <input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                autocomplete="new-password"
                required
            >
        </div>
    @endif

    <button type="submit">
        {{ $submit_label }}
    </button>
</form>
