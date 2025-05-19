<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function consultas(Request $request)
    {
        $usuario = Auth::user();
        $medico = $usuario->medico;

        $consultas = Consulta::where('medico_id', $medico->id)
            ->when($request->especialidade_id, function ($q) use ($request) {
                $q->whereHas('medico.especialidades', function ($q2) use ($request) {
                    $q2->where('especialidades.id', $request->especialidade_id);
                });
            })
            ->orderBy('data_hora', $request->ordem == 'mais_distante' ? 'desc' : 'asc')
            ->get();

        return view('medico.consultas.index', compact('consultas'));
    }
}
