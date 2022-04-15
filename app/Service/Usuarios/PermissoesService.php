<?php

namespace App\Service\Usuarios;

use Illuminate\Support\Facades\Auth;

class PermissoesService 
{
    public function verificaStatus($request)
    {
        if ($request->user()->status != '1') {
            Auth::logout();
            
            session()->flash('erro', 'Seu acesso está bloqueado.');

            return redirect()->route('login');
        }
    }
}