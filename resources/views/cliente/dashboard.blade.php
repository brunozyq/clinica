@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard do Cliente</h1>
    <p>Bem-vindo, {{ Auth::user()->nome }}!</p>
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('cliente.consultas.index') }}" class="btn btn-primary btn-block">
                Minhas Consultas
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('cliente.medico.index') }}" class="btn btn-secondary btn-block">
                Médicos Disponíveis
            </a>
        </div>
    </div>
</div>
@endsection
