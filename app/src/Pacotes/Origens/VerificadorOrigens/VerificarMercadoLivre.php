<?php

namespace App\src\Pacotes\Origens\VerificadorOrigens;


use App\src\Pacotes\Origens\Pacotes\MercadoLivre\MercadoLivrePacote;

class VerificarMercadoLivre implements VerificadorOrigemPacote
{
    public function verificar($dados)
    {
        if (!empty($dados['id']) && !empty($dados['sender_id'])) {
            return new MercadoLivrePacote($dados);
        }

        return null;
    }
}
