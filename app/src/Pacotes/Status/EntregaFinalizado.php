<?php

namespace App\src\Pacotes\Status;

use App\Models\Pacotes;

class EntregaFinalizado extends Status
{
    private string $status = 'pacote_entrega_finalizado';

    function getStatus(): string
    {
        return $this->status;
    }

    public function finalizar(int $id)
    {
        $pacote = new Pacotes();
        $pacote->newQuery()
            ->find($id)
            ->update(['status' => $this->status]);

        new HistoricoStatusPacote($id, $this->getStatus());

        session()->flash('sucesso', 'Entrega realizada com sucesso.');
    }
}
