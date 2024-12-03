@extends('layouts.app')

@section('title', 'Detalhes da Tarefa')

@section('content')
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->description }}</p>
    <a href="{{ route('tasks.index') }}" class="btn btn-primary">Voltar para a Lista</a>
@endsection
