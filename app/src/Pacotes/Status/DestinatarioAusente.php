<?php

namespace App\src\Pacotes\Status;

use App\Models\Pacotes;

class DestinatarioAusente extends Status
{
    private string $status = 'pacote_destinatario_ausente';

    function getStatus(): string
    {
        return $this->status;
    }

    function getNomeStatus(): string
    {
        return 'Destinatário ausente';
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
