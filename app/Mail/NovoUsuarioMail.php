<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovoUsuarioMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(string $nomeUsuario, string $link)
    {
        $this->nomeUsuario = $nomeUsuario;
        $this->link = $link;
    }

    public function build()
    {
        return $this->markdown('mail.novo-usuario', 
            [
                'nomeUsuario' => $this->nomeUsuario,
                'link' => $this->link
            ]
        );
    }
}
