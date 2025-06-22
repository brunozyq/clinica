@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Minhas Consultas</h1>
    
    <!-- Formulário para filtrar por ordem -->
    <form method="GET" action="{{ route('medico.consultas.index') }}">
        <div class="input-cad">
            <label for="ordem">Ordenar por:</label>
            <select name="ordem" id="ordem" class="form-control">
                <option value="mais_proxima" {{ (!request('ordem') || request('ordem') != 'mais_distante') ? 'selected' : '' }}>
                    Mais Próxima
                </option>
                <option value="mais_distante" {{ request('ordem') == 'mais_distante' ? 'selected' : '' }}>
                    Mais Distante
                </option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Filtrar</button>
    </form>
    
    @if($consultas->isEmpty())
        <p class="mt-3">Você não possui consultas agendadas.</p>
    @else
        <table class="table-container">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Data e Hora</th>
                    <th>Cliente</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consultas as $consulta)
                    <tr>
                        <td>{{ $consulta->id }}</td>
                        <td>{{ \Carbon\Carbon::parse($consulta->data_hora)->format('d/m/Y H:i') }}</td>
                        <td>{{ $consulta->cliente->nome ?? 'Não informado' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
