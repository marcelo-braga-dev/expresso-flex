<?php

namespace App\src\Pacotes\Status;

use App\src\Pacotes\Origens\VerificadorOrigens\VerificarOrigemPacote;

abstract class Status
{
    abstract function getStatus(): string;

    public function coletar($dados)
    {

    }

    public function alterarStatus($dados)
    {
        $verificarOrigem = new VerificarOrigemPacote();
        $origem = $verificarOrigem->verificarOrigem($dados);

        $pacote = $origem->getPacote($dados);

        $pacote->update([
            'status' => $this->getStatus()
        ]);

        new HistoricoStatusPacote($pacote->id, $this->getStatus());
    }

    public function finalizar(int $id)
    {

    }
}
