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
throw new \DomainException(print_r($pacote));
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

            alterarStatusPacote(id_usuario_atual(), $pacote->id, $this->getStatus());
            //new HistoricoStatusPacote(, );
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
