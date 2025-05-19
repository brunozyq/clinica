@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Especialidades</h1>
    <a href="{{ route('admin.especialidades.create') }}" class="btn btn-primary mb-3">Nova Especialidade</a>

    @if(session('sucesso'))
        <div class="alert alert-success">{{ session('sucesso') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($especialidades as $especialidade)
                <tr>
                    <td>{{ $especialidade->id }}</td>
                    <td>{{ $especialidade->nome }}</td>
                    <td>
                        <a href="{{ route('admin.especialidades.edit', $especialidade->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        
                        <form action="{{ route('admin.especialidades.destroy', $especialidade->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Confirma exclusão?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @if($especialidades->isEmpty())
                <tr><td colspan="3" class="text-center">Nenhuma especialidade cadastrada.</td></tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
