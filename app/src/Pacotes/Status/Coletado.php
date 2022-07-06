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

    function getNomeStatus(): string
    {
        return 'Pacote coletado';
    }

    public function coletar($dados)
    {
        $verificarOrigem = new VerificarOrigemPacote();
        $origem = $verificarOrigem->verificarOrigem($dados);

        if (empty($origem)) throw new \DomainException('Cod 1: Erro na leitura');

        return $origem->cadastrarPacote($dados);
    }
}
