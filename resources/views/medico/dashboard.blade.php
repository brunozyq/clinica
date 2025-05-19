@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard do Médico</h1>
    <p>Bem-vindo, Dr. {{ Auth::user()->nome }}!</p>

    <div class="row">
        <!-- Bloco para Consultas -->
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Minhas Consultas</h5>
                    <p class="card-text">Visualize e filtre suas consultas agendadas.</p>
                    <a href="{{ route('medico.consultas.index') }}" class="btn btn-primary">Ver Consultas</a>
                </div>
            </div>
        </div>
        
        <!-- Bloco para Perfil do Médico -->
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Meu Perfil</h5>
                    <p class="card-text">Verifique seus dados pessoais, especialidades e configurações.</p>
                    <!-- Substitua '#' pela rota correspondente ao perfil, se houver -->
                    <a href="#" class="btn btn-secondary">Ver Perfil</a>
                </div>
            </div>
        </div>
        
        <!-- Bloco para Estatísticas ou Outras Informações -->
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Estatísticas</h5>
                    <p class="card-text">Acompanhe suas consultas, disponibilidade e feedback dos pacientes.</p>
                    <a href="#" class="btn btn-info">Ver Estatísticas</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Você pode adicionar blocos adicionais conforme necessário -->
</div>
@endsection
