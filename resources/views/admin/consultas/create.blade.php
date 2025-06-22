@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agendar Consulta (Admin)</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.consultas.store') }}" method="POST">
        @csrf

        <!-- Campo: Cliente -->
        <div class="input-cad">
            <label for="cliente_id">Selecione o Cliente:</label>
            <select name="cliente_id" id="cliente_id" class="form-control">
                <option value="">Selecione um cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>

        <!-- Campo: Especialidade -->
        <div class="input-cad">
    <label for="especialidade">Selecione a Especialidade:</label>
    <select name="especialidade" id="especialidade" class="form-control">
        <option value="">Selecione uma especialidade</option>
        @foreach($especialidades as $especialidade)
            <option value="{{ $especialidade->id }}">{{ $especialidade->nome }}</option>
        @endforeach
    </select>
</div>

        <!-- Campo: Médico (será populado via JavaScript) -->
        <div class="input-cad">
            <label for="medico">Selecione o Médico:</label>
            <select name="medico_id" id="medico" class="form-control">
                <option value="">Selecione um médico</option>
            </select>
        </div>

        <!-- Campo: Data e Hora -->
        <div class="input-cad">
            <label for="data_hora">Data e Hora:</label>
            <input type="datetime-local" name="data_hora" id="data_hora" class="form-control">
        </div>

        <button type="submit" class="btn-cad">Agendar Consulta</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log("Script carregado");

    // Converte os dados dos médicos para JSON
    var medicosList = @json($medicos->toArray());
    console.log("MedicosList:", medicosList);

    // Obtém os elementos do DOM
    var medicoSelect = document.getElementById('medico');
    var especialidadeSelect = document.getElementById('especialidade');

    // Verifica se o select de especialidade existe
    if (!especialidadeSelect) {
        console.error("Elemento com id 'especialidade' não foi encontrado no DOM.");
        return;
    }
    
    // Função que popula o select de médicos filtrando por especialidade
    function populateMedicos(especialidadeId) {
        medicoSelect.innerHTML = '';
        var defaultOption = document.createElement('option');
        defaultOption.value = "";
        defaultOption.textContent = "Selecione um médico";
        medicoSelect.appendChild(defaultOption);

        medicosList.forEach(function(medico) {
            // Verifica se o objeto possui o array de especialidades
            var incluir = false;
            if (especialidadeId === '') {
                incluir = true;
            } else {
                if (medico.especialidades && Array.isArray(medico.especialidades)) {
                    medico.especialidades.forEach(function(espec) {
                        if (String(espec.id) === especialidadeId) {
                            incluir = true;
                        }
                    });
                }
            }
            
            // Se o médico dever ser incluído, obtém o nome via relacionamento 'usuario'
            if (incluir) {
                var nomeMedico = (medico.usuario && (medico.usuario.nome || medico.usuario.name)) || 'Nome não disponível';
                var option = document.createElement('option');
                option.value = medico.id;
                option.textContent = nomeMedico;
                medicoSelect.appendChild(option);
            }
        });
        
        console.log("Número de opções no select de médico:", medicoSelect.options.length);
    }
    
    // Evento para repopular quando a especialidade mudar
    especialidadeSelect.addEventListener('change', function() {
        populateMedicos(this.value);
    });
    
    // Popula inicialmente com todos os médicos
    populateMedicos('');
});
</script>

@endsection
