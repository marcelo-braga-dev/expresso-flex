<?php

namespace App\Http\Middleware\TiposUsuario;

use Closure;
use Illuminate\Http\Request;

class Cliente
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->tipo != 'cliente') {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
