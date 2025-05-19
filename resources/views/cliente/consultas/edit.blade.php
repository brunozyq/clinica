@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Consulta</h1>

    @if($errors->any())
      <div class="alert alert-danger">
         <ul>
          @foreach($errors->all() as $error)
             <li>{{ $error }}</li>
          @endforeach
         </ul>
      </div>
    @endif

    <form action="{{ route('cliente.consultas.update', $consulta->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Seleção de Médico -->
        <div class="form-group">
            <label for="medico_id">Médico</label>
            <select name="medico_id" id="medico_id" class="form-control" required>
                <option value="">Selecione um médico</option>
                @foreach($medicos as $medico)
                    <option value="{{ $medico->id }}" {{ $consulta->medico_id == $medico->id ? 'selected' : '' }}>
                        {{ $medico->usuario->nome ?? 'Nome indisponível' }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Data e Hora -->
        <div class="form-group">
            <label for="data_hora">Data e Hora</label>
            <input type="datetime-local" name="data_hora" id="data_hora" class="form-control" 
                   value="{{ date('Y-m-d\TH:i', strtotime($consulta->data_hora)) }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Atualizar Consulta</button>
    </form>
</div>
@endsection
