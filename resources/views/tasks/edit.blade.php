@extends('layouts.app')

@section('title', 'Editar Tarefa')

@section('content')
    <div class="container mt-4">
        <!-- Card para o formulário de edição de tarefa -->
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary mb-3">Voltar</a>

        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h3>Editar Tarefa</h3>
            </div>
            <div class="card-body">
                <!-- Formulário de Edição -->
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PATCH') <!-- Método PATCH para edição -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Nome da Tarefa</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrição</label>
                        <textarea class="form-control" id="description" name="description">{{ $task->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Atualizar Tarefa</button>
                </form>
            </div>
        </div>
    </div>
@endsection
