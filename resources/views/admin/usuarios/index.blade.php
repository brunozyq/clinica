@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Lista de Usuários</h2>
    <a href="{{ route('admin.usuarios.create') }}" class="btn btn-primary mb-3">Novo Usuário</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->nome }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ ucfirst($usuario->tipo) }}</td>
                <td>
                    <a href="{{ route('admin.usuarios.edit', $usuario->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
