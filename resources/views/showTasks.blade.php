<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Все задачи</title>
</head>
<body>
    <h1>Все Задачи</h1>
    @foreach ($tasks as $task)
        <div>{{ $task->title }}</div>
    @endforeach
</body>
</html>
