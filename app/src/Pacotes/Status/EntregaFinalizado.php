<?php

namespace App\src\Pacotes\Status;

use App\Models\Pacotes;
use App\src\Pacotes\Pagamentos\Entregador\Comissoes;

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

        alterarStatusPacote(id_usuario_atual(), $id, $this->getStatus());

        $comissao = new Comissoes($id);
        $comissao->entregador();
        $comissao->cliente();

        session()->flash('sucesso', 'Entrega realizada com sucesso.');
    }
}
