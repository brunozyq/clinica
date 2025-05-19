<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{
    public function index()
    {
        $especialidades = Especialidade::all();
        return view('admin.especialidades.index', compact('especialidades'));
    }

    public function create()
    {
        return view('admin.especialidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Especialidade::create([
            'nome' => $request->nome,
        ]);

        return redirect()->route('admin.especialidades.index')->with('sucesso', 'Especialidade cadastrada!');
    }

    public function show($id)
    {
        $especialidade = Especialidade::findOrFail($id);
        return view('admin.especialidades.show', compact('especialidade'));
    }

    public function edit($id)
    {
        $especialidade = Especialidade::findOrFail($id);
        return view('admin.especialidades.edit', compact('especialidade'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $especialidade = Especialidade::findOrFail($id);
        $especialidade->update([
            'nome' => $request->nome,
        ]);

        return redirect()->route('admin.especialidades.index')->with('sucesso', 'Especialidade atualizada!');
    }

    public function destroy($id)
    {
        $especialidade = Especialidade::findOrFail($id);
        $especialidade->delete();

        return redirect()->route('admin.especialidades.index')->with('sucesso', 'Especialidade removida!');
    }
}
