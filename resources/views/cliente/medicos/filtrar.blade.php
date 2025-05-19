@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Resultado da Filtragem de Médicos</h1>

    <a href="{{ route('cliente.medicos.index') }}" class="btn btn-secondary mb-3">
        Voltar para Todos os Médicos
    </a>

    @if($medicos->isEmpty())
        <p>Nenhum médico encontrado para a especialidade selecionada.</p>
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
                                @if($medico->especialidades->isNotEmpty())
                                    Especialidades: {{ $medico->especialidades->pluck('nome')->join(', ') }}
                                @else
                                    Especialidade não informada.
                                @endif
                            </p>
                            <a href="{{ route('consultas.store', ['medico_id' => $medico->id]) }}" class="btn btn-success">
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
