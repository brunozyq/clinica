<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        // Montar as credenciais
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('senha'),
        ];

        // Tentar autenticar
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirecionar conforme o tipo do usuário
            return match ($user->tipo) {
                'admin' => redirect()->route('admin.dashboard'),
                'medico' => redirect()->route('medico.consultas.index'),
                'cliente' => redirect()->route('cliente.consultas.index'),
                default => abort(403, 'Tipo de usuário inválido.'),
            };
        }

        // Falha na autenticação
        return back()->withErrors(['email' => 'Credenciais inválidas'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
