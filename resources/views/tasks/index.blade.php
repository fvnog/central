@extends('layouts.app')

@section('title', 'Lista de Tarefas')

@section('content')
    <div class="container mt-4">
        <!-- Título e botão de criação -->
        <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Criar Nova Tarefa</a>

        <!-- Tabela de Tarefas -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>
                                @if (!$task->is_completed)
                                    <span class="badge bg-warning">Pendente</span>
                                @else
                                    <span class="badge bg-success">Completada</span>
                                @endif
                            </td>
                            <td>
                                <!-- Editar Tarefa -->
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Editar</a>

                                <!-- Completar Tarefa -->
                                @if (!$task->is_completed)
                                    <form action="{{ route('tasks.complete', $task->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success btn-sm">Completar</button>
                                    </form>
                                @else
                                    <button class="btn btn-success btn-sm" disabled>Completada</button>
                                @endif

                                <!-- Deletar Tarefa -->
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
