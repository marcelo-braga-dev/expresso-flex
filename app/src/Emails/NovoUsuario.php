<?php

namespace App\src\Emails;

use App\Mail\NovoUsuarioMail;
use App\Models\PasswordNew;
use Illuminate\Support\Facades\Mail;

class NovoUsuario
{
    public function enviar(string $nome, string $email)
    {
        $email = strtolower($email);

        $hash = hash('md5', bin2hex(random_bytes(256)));

        $link = route('mail.usuario.retorno.novo-senha', [$email, $hash]);

        PasswordNew::create(['email' => $email, 'token' => $hash]);

        $conteudoEmail = new NovoUsuarioMail($nome, $link);

        $user = (object)[
            'email' => $email,
            'name' => $nome
        ];

        Mail::to($user)->send($conteudoEmail);
    }
}
