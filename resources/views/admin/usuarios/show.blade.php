@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalhes do Usuário</h1>

    <div class="card">
        <div class="card-header">
            {{ $usuario->name }}
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $usuario->id }}</p>
            <p><strong>Nome:</strong> {{ $usuario->name }}</p>
            <p><strong>Email:</strong> {{ $usuario->email }}</p>
            <p><strong>Tipo:</strong> {{ $usuario->is_admin ? 'Administrador' : 'Usuário comum' }}</p>
            <p><strong>Criado em:</strong> {{ $usuario->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Última atualização:</strong> {{ $usuario->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    <a href="{{ route('admin.usuarios.edit', $usuario->id) }}" class="btn btn-primary mt-3">Editar</a>
</div>
@endsection
