<?php

namespace App\src\Pacotes\Status;

use App\Models\PacotesHistoricos;
use App\src\Pacotes\Origens\VerificadorOrigens\VerificarOrigemPacote;

abstract class Status
{
    public function coletar($dados)
    {
        return;
    }

    public function update($dados, $userId)
    {
        $origem = (new VerificarOrigemPacote())->verificarOrigem($dados);
        $pacote = $origem->getPacote($dados);

        if (empty($pacote)) {
            modalErro('Não foi possível atualizar esse pacote.');
            return;
        }

        $pacotes = new PacotesHistoricos();
        $exist = $pacotes->newQuery()
            ->where([
                ['pacotes_id', '=', $pacote->id],
                ['status', '=', $this->getStatus()]
            ])->exists();

        if ($exist) throw new \DomainException('Status já cadastrado.');

        $pacote->update([
            'status' => $this->getStatus()
        ]);

        atualizarHistoricoPacote($userId, $pacote->id, $this->getStatus());
    }

    abstract function getStatus(): string;

    public function finalizar(int $id)
    {

    }
}
