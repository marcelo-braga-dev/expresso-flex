<?php

namespace App\src\Pacotes\Status;

use App\Models\PacotesHistoricos;
use App\src\Pacotes\Origens\VerificadorOrigens\VerificarOrigemPacote;

class Base extends Status
{
    private string $status = 'pacote_base';

    function getStatus(): string
    {
        return $this->status;
    }

    public function update($dados, $userId)
    {
        $origem = (new VerificarOrigemPacote())->verificarOrigem($dados);
        $pacote = $origem->getPacote($dados);

        if (empty($pacote->id)) {
            throw new \DomainException('Pacote não cadastrado.');
        }

        $exist = (new PacotesHistoricos())->newQuery()
            ->where([
                ['pacotes_id', '=', $pacote->id],
                ['status', '=', $this->getStatus()]
            ])->exists();

        if ($exist) throw new \DomainException('Status já cadastrado.');

        $pacote->update(['status' => $this->getStatus()]);

        atualizarHistoricoPacote($userId, $pacote->id, $this->getStatus());
    }
}
