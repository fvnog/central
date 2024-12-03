<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas Completadas</title>
</head>
<body>
    <h2>Tarefas Completadas</h2>
    <p>Aqui estão as tarefas completadas de hoje:</p>
    <ul>
        @foreach($tasks as $task)
            <li>{{ $task->title }} - {{ $task->description }}</li>
        @endforeach
    </ul>
</body>
</html>
