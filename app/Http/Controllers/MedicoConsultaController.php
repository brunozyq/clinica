<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicoConsultaController extends Controller
{
    /**
     * Exibe as consultas do médico autenticado.
     * Permite filtrar por ordem de data (ex.: mais próxima ou mais distante).
     */
    public function index(Request $request)
    {
        // Recupera o registro do médico com base no usuário autenticado
        $medico = Medico::where('usuario_id', Auth::id())->first();

        if (!$medico) {
            abort(403, 'Médico não encontrado para o usuário autenticado.');
        }

        // Verifica se existe parâmetro para ordenar as consultas
        $order = 'asc';
        if ($request->input('ordem') == 'mais_distante') {
            $order = 'desc';
        }

        // Carrega as consultas vinculadas a esse médico, com os relacionamentos necessários
        $consultas = Consulta::with(['cliente', 'medico.usuario', 'medico.especialidades'])
            ->where('medico_id', $medico->id)
            ->orderBy('data_hora', $order)
            ->get();

        return view('medico.consultas.index', compact('consultas'));
    }
}
