<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckGroup
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Verificar si el usuario tiene groups_id igual a 1
        if ($user && $user->groups_id == 1) {
            return $next($request);
        }

        // Redirigir o manejar el acceso no autorizado según tus necesidades
        return redirect('/')->with('error', 'No tienes permisos para acceder a esta página.');
    }
}
