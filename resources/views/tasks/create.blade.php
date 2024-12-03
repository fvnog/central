@extends('layouts.app')

@section('title', 'Criar Nova Tarefa')

@section('content')
    <div class="container mt-4">
        <!-- Botão para visualizar as tarefas -->
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary mb-3">Visualizar Tarefas</a>

        <!-- Card de formulário -->
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h3><i class="bi bi-clipboard-plus"></i> Criar Nova Tarefa</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <!-- Título da Tarefa -->
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Título da Tarefa</label>
                        <input type="text" name="title" id="title" class="form-control" required placeholder="Digite o título da tarefa">
                    </div>

                    <!-- Descrição da Tarefa -->
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Descrição</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Descreva a tarefa"></textarea>
                    </div>

                    <!-- Checkbox de Concluída -->
                    <div class="form-group form-check mb-3">
                        <input type="checkbox" name="is_completed" id="is_completed" class="form-check-input">
                        <label class="form-check-label" for="is_completed">Concluída</label>
                    </div>

                    <!-- Botão de Submissão -->
                    <button type="submit" class="btn btn-success">Criar Tarefa</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        @if(session('success'))
            toastr.success("{{ session('success') }}", "Sucesso!", {
                "positionClass": "toast-top-right",
                "timeOut": "5000",
                "closeButton": true,
            });
        @endif
    </script>
@endsection
