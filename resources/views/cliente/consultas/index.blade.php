@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Minhas Consultas</h1>

    @if(session('sucesso'))
        <div class="alert alert-success">
            {{ session('sucesso') }}
        </div>
    @endif

    {{-- Link para agendar nova consulta (a rota abaixo deve apontar para um formulário de criação) --}}
    <a href="{{ route('cliente.consultas.create') }}" class="btn btn-primary mb-3">
        Agendar Nova Consulta
    </a>

    @if($consultas->isEmpty())
        <p>Você não possui consultas marcadas.</p>
    @else
        <table class="table-container">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data e Hora</th>
                    <th>Médico</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consultas as $consulta)
                    <tr>
                        <td>{{ $consulta->id }}</td>
                        <td>{{ \Carbon\Carbon::parse($consulta->data_hora)->format('d/m/Y H:i') }}</td>
                        <td>
                            {{ $consulta->medico->usuario->nome ?? 'Não disponível' }}
                        </td>
                        <td>
                            <a href="{{ route('cliente.consultas.edit', $consulta->id) }}" class="btn btn-primary btn-sm">
                                Editar
                            </a>
                            <form action="{{ route('cliente.consultas.destroy', $consulta->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn-cancelar"
                                        onclick="return confirm('Tem certeza que deseja cancelar essa consulta?')">
                                    Cancelar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
