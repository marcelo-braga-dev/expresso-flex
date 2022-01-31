<?php

namespace App\src\Coletas;

use App\Models\RegioesEntregadores;
use App\Models\SolicitacaoRetiradas;

class PesquisarSolicitacoes
{
    public function pesquisar()
    {
        $solicitacaoRetiradas = new SolicitacaoRetiradas();
        $entregadores = new RegioesEntregadores();

        $todasSolicitacoes = [];
        $countColetas = 0;

        $areasAtuacao = $entregadores->query()
            ->where('user_id', '=', id_usuario_atual())
            ->where('meta_key', '=', 'regiao_coleta')
            ->get('value');

        foreach ($areasAtuacao as $regiaoEntregador) {

            $cepMin = str_pad($regiaoEntregador['value'], 8, '0');
            $cepMax = str_pad($regiaoEntregador['value'], 8, '9');

            $coletas = $solicitacaoRetiradas->query()
                ->where('cep', '>=', $cepMin)
                ->where('cep', '<=', $cepMax)
                ->where('status', '=', 'coleta_solicitada')
                ->get(['id', 'cep', 'user_id', 'loja'])
                ->toArray();

            $countColetas += count($coletas);

            if (count($coletas)) {
                $todasSolicitacoes[] =
                    [
                        'regiao' => $regiaoEntregador['value'],
                        'coletas' => $coletas
                    ];
            }
        }

        return ['solicitacoes' => $todasSolicitacoes, 'count' => $countColetas];
    }
}
