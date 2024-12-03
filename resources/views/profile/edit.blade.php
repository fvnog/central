@extends('layouts.app')

@section('title', 'Editar Perfil')

@section('content')
    <div class="container mt-4">
        <!-- Card para o formulário de edição do perfil -->
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h3>Editar Perfil</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PATCH')

                    <div class="form-group mb-3">
                        <label for="name">Nome</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                    </div>

                    <!-- Campos para atualizar a senha -->
                    <div class="form-group mb-3">
                        <label for="password">Nova Senha</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="password_confirmation">Confirmar Nova Senha</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
            </div>
        </div>

        <!-- Card para o formulário de exclusão de conta -->
        <div class="card shadow-lg mt-4">
            <div class="card-header bg-danger text-white">
                <h3>Excluir Conta</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('DELETE')

                    <div class="form-group mb-3">
                        <label for="password">Senha para Excluir Conta</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-danger">Excluir Conta</button>
                </form>
            </div>
        </div>
    </div>
@endsection
