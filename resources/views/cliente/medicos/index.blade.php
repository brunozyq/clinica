@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Médicos Disponíveis</h1>

    <!-- Formulário para filtrar por especialidade -->
    <form method="GET" action="{{ route('cliente.medicos.filtrar') }}">
        <div class="input-cad">
            <label for="especialidade_id">Filtrar por Especialidade:</label>
            <select name="especialidade_id" id="especialidade_id" class="form-control">
    <option value="">Todas as Especialidades</option>
    @foreach($especialidades as $especialidade)
        <option value="{{ $especialidade->id }}">{{ $especialidade->nome }}</option>
    @endforeach
</select>
        </div>
        <button type="submit" class="btn btn-primary my-2">Filtrar</button>
    </form>

    <!-- Listagem dos médicos -->
    @if($medicos->isEmpty())
        <p>Nenhum médico encontrado.</p>
    @else
        <div class="row">
            @foreach($medicos as $medico)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $medico->usuario->nome ?? 'Nome indisponível' }}
                            </h5>
                            <p class="card-text">
                                <strong>Especialidades:</strong>
                                @if($medico->especialidades->isNotEmpty())
                                    {{ $medico->especialidades->pluck('nome')->join(', ') }}
                                @else
                                    Não informado.
                                @endif
                            </p>
                            <!-- Link para agendar consulta com esse médico -->
                            <a href="{{ route('cliente.consultas.create', ['medico_id' => $medico->id]) }}" class="btn btn-success">
                                Agendar Consulta
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
