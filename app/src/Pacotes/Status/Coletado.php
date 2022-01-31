<?php

namespace App\src\Pacotes\Status;

use App\src\Pacotes\Origens\VerificadorOrigens\VerificarOrigemPacote;

class Coletado extends Status
{
    private string $status = 'pacote_coletado';

    function getStatus(): string
    {
        return $this->status;
    }

    public function coletar($dados)
    {
        $verificarOrigem = new VerificarOrigemPacote();
        $origem = $verificarOrigem->verificarOrigem($dados);
        $origem->cadastrarPacote($dados);
    }
}
