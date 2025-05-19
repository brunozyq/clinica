<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Medico;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Especialidade;


class ClienteController extends Controller
{
    public function consultas(Request $request)
    {
        $usuario = Auth::user();

        $consultas = Consulta::where('cliente_id', $usuario->id)
            ->orderBy('data_hora', $request->ordem == 'mais_distante' ? 'desc' : 'asc')
            ->get();

        return view('cliente.consultas', compact('consultas'));
    }

    public function verMedicos(Request $request)
{
    $medicos = Medico::with('especialidades')
        ->when($request->especialidade_id, function ($q) use ($request) {
            $q->whereHas('especialidades', function ($query) use ($request) {
                $query->where('especialidades.id', $request->especialidade_id);
            });
        })
        ->get();

    // Busca todas as especialidades para o filtro
    $especialidades = Especialidade::all();

    return view('cliente.medicos.index', compact('medicos', 'especialidades'));
}

}
