<?php

namespace App\src\Pacotes\Origens\VerificadorOrigens;


use App\src\Pacotes\Origens\MercadoLivre\MercadoLivre;

class VerificarMercadoLivre implements VerificadorOrigemPacote
{
    public function verificar($dados)
    {
        if (!empty($dados['id']) && !empty($dados['sender_id'])) {
            return new MercadoLivre();
        }

        return null;
    }
}
