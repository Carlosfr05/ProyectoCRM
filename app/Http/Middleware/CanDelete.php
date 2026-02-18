<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CanDelete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Solo los admins pueden eliminar
        if (auth()->check() && auth()->user()->isAdmin()) {
            return $next($request);
        }

        // Si no es admin, redirigir con mensaje de error
        return back()->with('error', 'No tienes permiso para eliminar. Solo los administradores pueden eliminar registros.');
    }
}
