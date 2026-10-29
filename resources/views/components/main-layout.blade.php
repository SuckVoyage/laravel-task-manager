<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/my.css')}}">
</head>
<body>
    <div class="navbar">
        <a href="{{ route('users.all') }}">Все пользователи</a>
        <a href="{{ route('roles.all') }}">Все роли</a>
        <a href="{{ route('tasks.index') }}">Все задачи</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Выйти</button>
        </form>
    </div>
    @if (auth()->check() && auth()->user()->roles()->where('name', 'Admin')->exists())
        <section class="page-section admin-bar">
            {{ $admin ?? '' }}
        </section>
    @endif
    <div class="content-grid {{ isset($posts) ? '' : 'content-grid--single' }}">
        <section class="page-section">
            {{ $slot }}
        </section>

        @isset($posts)
            <section class="page-section">
                {{ $posts }}
            </section>
        @endisset
    </div>
</body>
</html>
