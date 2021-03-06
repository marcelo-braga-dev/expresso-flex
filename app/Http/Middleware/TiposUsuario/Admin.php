<?php

namespace App\Http\Middleware\TiposUsuario;

use Closure;
use Illuminate\Http\Request;

class Admin
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
        if ($request->user()->tipo != 'admin') {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
