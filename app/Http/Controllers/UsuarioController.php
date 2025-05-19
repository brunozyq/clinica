<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Medico;
use App\Models\Especialidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $especialidades = Especialidade::all();
        return view('admin.usuarios.create', compact('especialidades'));
        //return view('admin.usuarios.create');
    }

 public function store(Request $request)
{

     //dd($request->all());
    $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email|unique:usuarios,email',
        'senha' => 'required|string|min:6|confirmed',
        'tipo' => 'required|in:admin,medico,cliente',
        'especialidades' => 'array',
        'crm' => 'nullable|required_if:tipo,medico|string|max:50', // validação para crm
    ]);

     if ($request->tipo !== 'medico') {
        $request->request->remove('crm');
    }
    try {
        DB::beginTransaction();
        
        $usuario = new Usuario();
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->senha = Hash::make($request->senha);
        $usuario->tipo = $request->tipo;
        $usuario->save();

        if ($usuario->tipo === 'medico') {
            // Cria médico passando crm também
            $medico = Medico::create([
                'usuario_id' => $usuario->id,
                'crm' => $request->crm,
            ]);

            if ($request->has('especialidades')) {
                $medico->especialidades()->sync($request->especialidades);
            }
        }

        DB::commit();

        return redirect()->route('admin.usuarios.index')->with('sucesso', 'Usuário cadastrado!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors(['erro' => 'Erro ao salvar usuário: ' . $e->getMessage()]);
    }
}
    


    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('admin.usuarios.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('admin.usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
{
    $usuario = Usuario::findOrFail($id);

    $request->validate([
        'nome' => 'required|string|max:255',
        'email' => "required|email|unique:usuarios,email,{$id}",
        'senha' => 'nullable|string|min:6|confirmed',
        'tipo' => 'required|in:admin,medico,cliente',
        'especialidades' => 'array',
        'crm' => 'required_if:tipo,medico|string|max:50',
    ]);

    $usuario->nome = $request->nome;
    $usuario->email = $request->email;
    if ($request->filled('senha')) {
        $usuario->senha = Hash::make($request->senha);
    }
    $usuario->tipo = $request->tipo;
    $usuario->save();

    if ($usuario->tipo === 'medico') {
        $medico = $usuario->medico ?? Medico::create(['usuario_id' => $usuario->id]);

        // Atualiza crm
        $medico->crm = $request->crm;
        $medico->save();

        if ($request->has('especialidades')) {
            $medico->especialidades()->sync($request->especialidades);
        }
    } else {
        // Se trocar para outro tipo que não médico, remove registro de médico
        if ($usuario->medico) {
            $usuario->medico->delete();
        }
    }

    return redirect()->route('admin.usuarios.index')->with('sucesso', 'Usuário atualizado!');
}

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('admin.usuarios.index')->with('sucesso', 'Usuário excluído!');
    }
}
