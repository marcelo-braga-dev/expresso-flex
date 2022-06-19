<?php

namespace App\src\Pacotes\Status;

use App\Exceptions\QrCodeException;
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

        if (empty($origem)) throw new \DomainException('Cod 1: Erro na leitura');

        $origem->cadastrarPacote($dados);
    }
}
