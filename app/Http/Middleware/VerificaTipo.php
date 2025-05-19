<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificaTipo
{
    public function handle(Request $request, Closure $next, string $tipo): Response
    {
      $usuario = $request->user();

      if (!$usuario || trim(strtolower($usuario->tipo)) !== trim(strtolower($tipo))) {
    abort(403, 'Acesso não autorizado.');
}


        return $next($request);
    }
}
