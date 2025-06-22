@extends('layouts.app')

@section('content')

<style>

  #container {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

  .container h1 {
  color: var(--highlight-color);
  font-weight: 700;
  text-align: center;
  margin-bottom: 2rem;
  text-shadow: 1px 1px 3px rgba(0, 180, 216, 0.7);
}

.row {
  display: flex;
  justify-content: center;
  gap: 20px;
  flex-wrap: wrap;
  margin-top: 50px
}

.col-md-4 {
  flex: 1 1 250px;
  max-width: 300px;
}

.btn {
  font-weight: 600;
  padding: 15px 25px;
  border-radius: 8px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.25);
  transition: all 0.3s ease;
  display: block;
  text-align: center;
}

.btn-primary {
  background-color: var(--accent-color);
  color: var(--text-color);
  border: none;
}

.btn-primary:hover {
  background-color: #0096c7;
  box-shadow: 0 8px 20px rgba(0, 180, 216, 0.7);
  transform: translateY(-3px);
}

.btn-success {
  background-color: var(--accent-color);
  color: var(--text-color);
  border: none;
}

.btn-success:hover {
  background-color: #0096c7;
  box-shadow: 0 8px 20px rgba(0, 180, 216, 0.7);
  transform: translateY(-3px);
}

.btn-info {
  background-color: var(--accent-color);
  color: var(--text-color);
  border: none;
}

.btn-info:hover {
  background-color: #0096c7;
  box-shadow: 0 8px 20px rgba(0, 180, 216, 0.7);
  transform: translateY(-3px);
}

/* Responsivo */
@media (max-width: 768px) {
  .row {
    flex-direction: column;
    align-items: center;
  }

  .col-md-4 {
    max-width: 100%;
    margin-bottom: 15px;
  }
}
</style>
<div class="container" id="container">
    <h1 class="mb-4">Painel Administrativo</h1>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('admin.usuarios.index') }}" class="btn btn-primary btn-block">Gerenciar Usuários</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('admin.especialidades.index') }}" class="btn btn-success btn-block">Gerenciar Especialidades</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('admin.consultas.index') }}" class="btn btn-info btn-block">Gerenciar Consultas</a>
        </div>
    </div>
</div>
@endsection
