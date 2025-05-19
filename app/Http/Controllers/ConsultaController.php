<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Especialidade;
use App\Models\Medico;
use App\Models\Usuario; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultaController extends Controller
{
    /**
     * Listar todas as consultas.
     */
    public function index()
    {
        $consultas = Consulta::with(['cliente', 'medico.usuario', 'medico.especialidades'])->get();
        return view('admin.consultas.index', compact('consultas'));
    }

    /**
     * Mostrar formulário de criação.
     */
    public function create()
{
    $clientes = Usuario::where('tipo', 'cliente')->get();
    $especialidades = Especialidade::all();
    $medicos = Medico::with('especialidades', 'usuario')->get(); // Certifica que as especialidades são carregadas

    return view('admin.consultas.create', compact('clientes', 'especialidades', 'medicos'));
}

    /**
     * Processar a criação de uma nova consulta.
     */
    public function store(Request $request)
    {
        $request->validate([
            'medico_id' => 'required|exists:medicos,id',
            'data_hora' => 'required|date|after:now',
            'cliente_id' => 'nullable|exists:usuarios,id'
        ]);

        $cliente_id = Auth::user()->tipo === 'admin' && $request->has('cliente_id')
            ? $request->cliente_id
            : Auth::id();

        Consulta::create([
            'medico_id' => $request->medico_id,
            'cliente_id' => $cliente_id,
            'data_hora' => $request->data_hora,
        ]);

        return redirect()->route('admin.consultas.index')->with('sucesso', 'Consulta agendada!');
    }

    /**
     * Mostrar formulário de edição.
     */
    public function edit($id)
{
    $consulta = Consulta::findOrFail($id);
    $especialidades = Especialidade::all();

    // Filtrar médicos que possuem a especialidade correta
    $medicos = Medico::whereHas('especialidades', function ($query) use ($consulta) {
        $query->where('especialidade_id', $consulta->medico->especialidades->first()->id);
    })->get();

    $clientes = Usuario::where('tipo', 'cliente')->get();

    return view('admin.consultas.edit', compact('consulta', 'especialidades', 'medicos', 'clientes'));
}

    /**
     * Processar edição da consulta.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'data_hora' => 'required|date|after:now',
            'medico_id' => 'required|exists:medicos,id',
            'cliente_id' => 'nullable|exists:usuarios,id'
        ]);

        $consulta = Consulta::findOrFail($id);

        $consulta->update([
            'medico_id' => $request->medico_id,
            'cliente_id' => Auth::user()->tipo === 'admin' ? $request->cliente_id : $consulta->cliente_id,
            'data_hora' => $request->data_hora,
        ]);

        return redirect()->route('admin.consultas.index')->with('sucesso', 'Consulta atualizada!');
    }

    /**
     * Excluir uma consulta.
     */
    public function destroy($id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->delete();

        return redirect()->route('admin.consultas.index')->with('sucesso', 'Consulta cancelada!');
    }
}
