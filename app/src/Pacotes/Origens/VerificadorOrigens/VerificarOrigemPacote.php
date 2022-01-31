<?php

namespace App\src\Pacotes\Origens\VerificadorOrigens;

class VerificarOrigemPacote
{
    public function verificarOrigem($dados)
    {
        $origem = new VerificarExpressoFlex(new VerificarMercadoLivre());

        return $origem->verificar($dados);
    }
}
