<?php

namespace App\Http\Middleware\TiposUsuario;

use App\Service\Usuarios\PermissoesService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Cliente extends PermissoesService
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
        $res = $this->verificaStatus($request);

        if (!empty($res)) return $res;

        if ($request->user()->tipo != 'cliente') {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
