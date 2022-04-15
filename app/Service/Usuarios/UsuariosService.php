<?php

namespace App\Service\Usuarios;

use App\Models\PasswordNew;

class UsuariosService 
{
    public function getNovosUsuarios()
    {
        $novaConta = [];
        $passwordNews = PasswordNew::get('email');

        foreach ($passwordNews as $passwordNew)
        {
            $novaConta[$passwordNew->email] = true;
        }

        return $novaConta;
    }
}