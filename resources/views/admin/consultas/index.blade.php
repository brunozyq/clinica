@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Consultas (Admin)</h1>
    <a href="{{ route('admin.consultas.create') }}" class="btn btn-success mb-3">Agendar Nova Consulta</a>

    @if(session('sucesso'))
        <div class="alert alert-success">
            {{ session('sucesso') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Médico</th>
                <th>Especialidades</th>
                <th>Data e Hora</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consultas as $consulta)
            <tr>
                <td>{{ $consulta->id }}</td>
                <td>{{ $consulta->cliente->nome ?? 'N/A' }}</td>
                <td>{{ $consulta->medico->usuario->nome }}</td>
                <td>{{ $consulta->medico->especialidades->pluck('nome')->join(', ') }}</td>
                <td>{{ \Carbon\Carbon::parse($consulta->data_hora)->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="{{ route('admin.consultas.edit', $consulta->id) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('admin.consultas.destroy', $consulta->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirmar cancelamento da consulta?')">Cancelar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
