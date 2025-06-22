@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agendar Nova Consulta</h1>
    <form action="{{ route('cliente.consultas.store') }}" method="POST">
        @csrf

        <!-- Campo para selecionar a Especialidade -->
        <div class="input-cad">
            <label for="especialidade_id">Especialidade</label>
            <select name="especialidade_id" id="especialidade_id" class="form-control">
                <option value="">Selecione uma especialidade</option>
                @foreach($especialidades as $especialidade)
                    <option value="{{ $especialidade->id }}">{{ $especialidade->nome }}</option>
                @endforeach
            </select>
        </div>

        <!-- Campo para selecionar o Médico -->
        <div class="input-cad">
            <label for="medico_id">Médico</label>
            <select name="medico_id" id="medico_id" class="form-control">
                <option value="">Selecione um médico</option>
                @foreach($medicos as $medico)
                    <option value="{{ $medico->id }}">
                        {{ $medico->usuario->nome }} - 
                        @if($medico->especialidades->isNotEmpty())
                            {{ $medico->especialidades->pluck('nome')->join(', ') }}
                        @else
                            Sem especialidade
                        @endif
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Campo para data e hora -->
        <div class="input-cad">
            <label for="data_hora">Data e Hora</label>
            <input type="datetime-local" name="data_hora" id="data_hora" class="form-control" required>
        </div>

        <button type="submit" class="btn-cad">Agendar Consulta</button>
    </form>
</div>
@endsection
