<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\ConsultaController as AdminConsultaController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\ClienteController;


/*
|--------------------------------------------------------------------------
| Rotas Públicas
|--------------------------------------------------------------------------
*/

// Página inicial genérica
Route::get('/', function () {
    return view('welcome'); // ou crie uma view básica chamada 'welcome.blade.php'
})->name('home');

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.entrar');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Rotas para ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verifica.tipo:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('/usuarios', UsuarioController::class);
    Route::resource('/especialidades', EspecialidadeController::class);
    Route::resource('/consultas', AdminConsultaController::class);
});


/*
|--------------------------------------------------------------------------
| Rotas para MÉDICO
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verifica.tipo:medico'])->prefix('medico')->name('medico.')->group(function () {
    Route::get('/consultas', [MedicoController::class, 'consultas'])->name('consultas.index');
    Route::get('/consultas/filtrar', [MedicoController::class, 'filtrar'])->name('consultas.filtrar');
});


/*
|--------------------------------------------------------------------------
| Rotas para CLIENTE
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\ClienteConsultaController;

Route::middleware(['auth', 'verifica.tipo:cliente'])
    ->prefix('cliente')
    ->name('cliente.')
    ->group(function () {
        // Rota para listar as consultas do cliente
        Route::get('/consultas', [ClienteConsultaController::class, 'index'])
            ->name('consultas.index');

        // Rota para exibir o formulário de criação
        Route::get('/consultas/create', [ClienteConsultaController::class, 'create'])
            ->name('consultas.create');

        // Rota para processar a criação da consulta
        Route::post('/consultas', [ClienteConsultaController::class, 'store'])
            ->name('consultas.store');

        // Rota para editar (com restrição para evitar conflito com palavras como "create")
        Route::get('/consultas/{id}/edit', [ClienteConsultaController::class, 'edit'])
            ->name('consultas.edit')
            ->where('id', '[0-9]+');

        // Rota para atualizar
        Route::put('/consultas/{id}', [ClienteConsultaController::class, 'update'])
            ->name('consultas.update')
            ->where('id', '[0-9]+');

        // Rota para excluir
        Route::delete('/consultas/{id}', [ClienteConsultaController::class, 'destroy'])
            ->name('consultas.destroy')
            ->where('id', '[0-9]+');

        // Outras rotas relacionadas a médicos, se necessário:
        Route::get('/medicos', [ClienteController::class, 'verMedicos'])->name('medicos.index');
        Route::get('/medicos/filtrar', [ClienteController::class, 'verMedicos'])->name('medicos.filtrar');


    });

