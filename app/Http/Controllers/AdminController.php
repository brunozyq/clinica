<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Medico;
use App\Models\Especialidade;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $medicos = Medico::with('usuario')->get();
        $clientes = Usuario::where('tipo', 'cliente')->get();
        $especialidades = Especialidade::all();
        return view('admin.dashboard', compact('medicos', 'clientes', 'especialidades'));
    }

    // Cadastro de médico
    public function cadastrarMedico(Request $request)
    {
        $usuario = Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => bcrypt($request->senha),
            'tipo' => 'medico',
        ]);

        $medico = Medico::create(['usuario_id' => $usuario->id]);
        $medico->especialidades()->sync($request->especialidades);

        return redirect()->back()->with('sucesso', 'Médico cadastrado!');
    }

    // Cadastro de cliente
    public function cadastrarCliente(Request $request)
    {
        Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => bcrypt($request->senha),
            'tipo' => 'cliente',
        ]);

        return redirect()->back()->with('sucesso', 'Cliente cadastrado!');
    }

    public function excluirUsuario($id)
    {
        Usuario::findOrFail($id)->delete();
        return redirect()->back()->with('sucesso', 'Usuário excluído!');
    }

    public function cadastrarEspecialidade(Request $request)
    {
        Especialidade::create(['nome' => $request->nome]);
        return redirect()->back()->with('sucesso', 'Especialidade cadastrada!');
    }

    public function excluirEspecialidade($id)
    {
        Especialidade::findOrFail($id)->delete();
        return redirect()->back()->with('sucesso', 'Especialidade removida!');
    }
}
