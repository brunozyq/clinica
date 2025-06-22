@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="tit-cad">Cadastrar Novo Usuário</h2>

    <form action="{{ route('admin.usuarios.store') }}" method="POST">
        @csrf

        <div class="input-cad">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="input-cad">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="input-cad">
            <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" id="tipo" class="form-select" required>
                <option value="admin">Administrador</option>
                <option value="medico">Médico</option>
                <option value="cliente">Cliente</option>
            </select>
        </div>

        {{-- Campo CRM (inicialmente escondido) --}}
        <div class="input-cad" id="crm-container" style="display:none;">
            <label for="crm" class="form-label">CRM</label>
            <input type="text" name="crm" id="crm" class="form-control">
        </div>

        {{-- Campo de especialidades (inicialmente escondido) --}}
        <div class="input-cad" id="especialidades-container" style="display:none;">
            <label for="especialidades" class="form-label">Especialidades</label>
            <select name="especialidades[]" id="especialidades" class="form-select" multiple>
                @foreach($especialidades as $especialidade)
                    <option value="{{ $especialidade->id }}">{{ $especialidade->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-cad">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" name="senha" class="form-control" required>
        </div>

        <div class="input-cad">
            <label for="senha_confirmation" class="form-label">Confirme a Senha</label>
            <input type="password" name="senha_confirmation" class="form-control" required>
        </div>

        <button class="btn-cad">Salvar</button>
    </form>
</div>

<script>
    document.getElementById('tipo').addEventListener('change', function() {
        const especialidadesContainer = document.getElementById('especialidades-container');
        const crmContainer = document.getElementById('crm-container');
        if (this.value === 'medico') {
            especialidadesContainer.style.display = 'block';
            crmContainer.style.display = 'block';
            document.getElementById('crm').required = true;
        } else {
            especialidadesContainer.style.display = 'none';
            crmContainer.style.display = 'none';
            document.getElementById('crm').required = false;
        }
    });

    // Dispara evento para ajustar campos caso esteja editando
    document.getElementById('tipo').dispatchEvent(new Event('change'));
</script>
@endsection
