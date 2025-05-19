<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Especialidade;
use App\Models\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteConsultaController extends Controller
{
    /**
     * Lista todas as consultas do cliente autenticado.
     */
    public function index()
    {
        $consultas = Consulta::with(['medico.usuario', 'medico.especialidades'])
            ->where('cliente_id', Auth::id())
            ->orderBy('data_hora', 'asc')
            ->get();

        return view('cliente.consultas.index', compact('consultas'));
    }

    /**
     * Mostra o formulário de criação de consulta.
     */
    public function create()
    {
        $especialidades = Especialidade::all();
        $medicos = Medico::with('especialidades', 'usuario')->get();

        return view('cliente.consultas.create', compact('especialidades', 'medicos'));
    }

    /**
     * Processa a criação de uma nova consulta.
     */
    public function store(Request $request)
    {
        $request->validate([
            'medico_id' => 'required|exists:medicos,id',
            'data_hora' => 'required|date|after:now',
        ]);

        Consulta::create([
            'medico_id' => $request->medico_id,
            'cliente_id' => Auth::id(),
            'data_hora' => $request->data_hora,
        ]);

        return redirect()->route('cliente.consultas.index')
                         ->with('sucesso', 'Consulta agendada com sucesso!');
    }

    /**
     * Mostra o formulário de edição da consulta.
     */
    public function edit($id)
    {
        $consulta = Consulta::findOrFail($id);

        if ($consulta->cliente_id !== Auth::id()) {
            abort(403, 'Acesso não autorizado.');
        }

        $especialidades = Especialidade::all();
        $medicos = Medico::with('especialidades', 'usuario')->get();

        return view('cliente.consultas.edit', compact('consulta', 'especialidades', 'medicos'));
    }

    /**
     * Processa a atualização da consulta.
     */
    public function update(Request $request, $id)
    {
        $consulta = Consulta::findOrFail($id);

        if ($consulta->cliente_id !== Auth::id()) {
            abort(403, 'Acesso não autorizado.');
        }

        $request->validate([
            'medico_id' => 'required|exists:medicos,id',
            'data_hora' => 'required|date|after:now',
        ]);

        $consulta->update([
            'medico_id' => $request->medico_id,
            'data_hora' => $request->data_hora,
        ]);

        return redirect()->route('cliente.consultas.index')
                         ->with('sucesso', 'Consulta atualizada com sucesso!');
    }

    /**
     * Cancela (exclui) a consulta.
     */
    public function destroy($id)
    {
        $consulta = Consulta::findOrFail($id);

        if ($consulta->cliente_id !== Auth::id()) {
            abort(403, 'Acesso não autorizado.');
        }

        $consulta->delete();

        return redirect()->route('cliente.consultas.index')
                         ->with('sucesso', 'Consulta cancelada com sucesso!');
    }
}
