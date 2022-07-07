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

    function getNomeStatus(): string
    {
        return 'Entrega finalizada';
    }

    public function finalizar(int $id)
    {
        $pacote = (new Pacotes())->newQuery()
            ->find($id);

        if (empty($pacote)) return redirect()->back();

        if (!entregaNaoFinalizada($pacote->status)) {
            $status = get_status_pacote($pacote->status);
            modalErro('ATENÇÃO: ' . $status);
            echo redirect()->route('entregadores.pacote.show', $pacote->id);exit();
        }

        $pacote->update(['status' => $this->status]);

        atualizarHistoricoPacote(id_usuario_atual(), $id, $this->getStatus());

        $comissao = new Comissoes($id);
        $comissao->entregador();
        $comissao->cliente();

        session()->flash('sucesso', 'Entrega realizada com sucesso.');
    }
}
