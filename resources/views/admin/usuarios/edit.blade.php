@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Editar Usuário</h2>

    <form action="{{ route('admin.usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $usuario->nome }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" value="{{ $usuario->email }}" required>
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" class="form-select" required>
                <option value="admin" {{ $usuario->tipo == 'admin' ? 'selected' : '' }}>Administrador</option>
                <option value="medico" {{ $usuario->tipo == 'medico' ? 'selected' : '' }}>Médico</option>
                <option value="cliente" {{ $usuario->tipo == 'cliente' ? 'selected' : '' }}>Cliente</option>
            </select>
        </div>

        <button class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
