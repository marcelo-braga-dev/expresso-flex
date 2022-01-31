<?php

namespace App\Http\Middleware;

use App\Models\MetaValues;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BloqueioAcessoApp
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $meta = new MetaValues();
            $bloqueio = $meta->value('config_bloqueio_acesso_geral');
            $email = auth()->user()->email;

            if ($bloqueio &&
                $email != 'cliente1@email.com' &&
                $email != 'entregador1@email.com' &&
                $email != 'conferente1@email.com' &&
                $email != 'admin1@email.com'
            ) {
                session()->flash('erro', 'Plataforma em manutenção, por favor, aguarde.');
                Auth::logout();
                return redirect('login');
            }
        }

        return $next($request);
    }
}
