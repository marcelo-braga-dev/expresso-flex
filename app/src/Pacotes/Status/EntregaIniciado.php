<?php

namespace App\src\Pacotes\Status;

use App\Models\PacotesHistoricos;
use App\src\Pacotes\Origens\VerificadorOrigens\VerificarOrigemPacote;

class EntregaIniciado extends Status
{
    private string $status = 'pacote_entrega_iniciado';

    function getStatus(): string
    {
        return $this->status;
    }

    public function update($dados, $userId)
    {
        $origem = (new VerificarOrigemPacote())->verificarOrigem($dados);
        $pacote = $origem->getPacote($dados);

        if (empty($pacote->id)) {
            throw new \DomainException('Não foi possível atualizar, pacote não encontrado.');
        }

        $pacotes = new PacotesHistoricos();
        $exist = $pacotes->newQuery()
            ->where([
                ['pacotes_id', '=', $pacote->id],
                ['status', '=', $this->getStatus()]
            ])->exists();

        if ($exist) throw new \DomainException('Status já cadastrado.');

        $pacote->update([
            'status' => $this->getStatus(),
            'entregador' => $userId
        ]);

        atualizarHistoricoPacote($userId, $pacote->id, $this->getStatus());
    }
}
