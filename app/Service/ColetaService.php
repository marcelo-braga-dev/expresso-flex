<?php

namespace App\Service;

use App\Models\SolicitacaoRetiradas;

class ColetaService
{
    public function criarColetaComEntregador(string $id)
    {
        $solicitarRetirada = new SolicitacaoRetiradas();

        $loja = get_loja($id);

        $idUsuario = $loja->user_id;
        $idLoja = $loja->id;
        $cep = $loja->cep;
        $entregador = id_usuario_atual();

        $solicitarRetirada->create(
            [
                'user_id' => $idUsuario,
                'cep' => $cep,
                'entregador' => $entregador,
                'loja' => $idLoja,
                'status' => 'coleta_aceita'
            ]
        );

        session()->flash('sucesso', 'Solicitação de coleta realizada com sucesso.');
    }
}
