<?php

namespace App\src\Pacotes\Status;

use App\Models\PacotesHistoricos;
use App\src\Pacotes\Origens\VerificadorOrigens\VerificarOrigemPacote;

abstract class Status
{
    public function coletar($dados)
    {

    }

    public function update($dados)
    {
        $verificarOrigem = new VerificarOrigemPacote();
        $origem = $verificarOrigem->verificarOrigem($dados);

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

        if (!$exist) {
            $pacote->update([
                'status' => $this->getStatus()
            ]);

            if (auth()->user()->tipo == 'entregador') {
                $pacote->update([
                    'entregador' => id_usuario_atual()
                ]);
            }

            atualizarHistoricoPacote(id_usuario_atual(), $pacote->id, $this->getStatus());

            modalSucesso('Pacote registrado com sucesso!');
            return;
        }
        modalErro('Pacote já registrado.');
    }

    abstract function getStatus(): string;

    public function finalizar(int $id)
    {

    }
}
