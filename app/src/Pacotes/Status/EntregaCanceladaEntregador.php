<?php

namespace App\src\Pacotes\Status;

use App\Models\Pacotes;

class EntregaCanceladaEntregador extends Status
{
    private string $status = 'pacote_entrega_cancelada_entregador';

    function getStatus(): string
    {
        return $this->status;
    }

    function getNomeStatus(): string
    {
        return 'Entrega cancelada pelo entregador';
    }

    public function update($id, $mensagem)
    {
        $pacote = (new Pacotes())->newQuery()->findOrFail($id);

        $pacote->update([
            'status' => $this->getStatus(),
            'entregador' => id_usuario_atual()
        ]);

        atualizarHistoricoPacote(id_usuario_atual(), $pacote->id, $this->getStatus(), $mensagem);
    }
}
