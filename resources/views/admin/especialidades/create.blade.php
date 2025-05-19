@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Nova Especialidade</h1>

    <form action="{{ route('admin.especialidades.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Especialidade</label>
            <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome') }}" required>
            @error('nome')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>
        <a href="{{ route('admin.especialidades.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
