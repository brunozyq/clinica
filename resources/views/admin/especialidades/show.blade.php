@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Especialidade: {{ $especialidade->nome }}</h1>

    <a href="{{ route('admin.especialidades.index') }}" class="btn btn-secondary mb-3">Voltar</a>
</div>
@endsection
