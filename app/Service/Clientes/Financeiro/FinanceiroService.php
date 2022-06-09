<?php

namespace App\Service\Clientes\Financeiro;

use App\Models\ComissoesEntregadores;
use App\Models\FretesRealizados;

class FinanceiroService
{
    public function historicoMensal($classe, $id = null)
    {
        $id = $id ?? id_usuario_atual();

        $todosFretes = $classe->newQuery()
            ->where('user_id', '=', $id)
            ->orderBy('created_at', 'DESC')
            ->get();

        $fretes = [];
        foreach ($todosFretes as $item) {
            $mes = date('m/Y', strtotime($item['created_at']));

            $fretes[$mes]['mes'] = date('m', strtotime($item['created_at']));
            $fretes[$mes]['ano'] = date('Y', strtotime($item['created_at']));

            if (empty($fretes[$mes][$item['status']]['valor'])) {

                $fretes[$mes][$item['status']]['status'] = $item['status'];
                $fretes[$mes][$item['status']]['valor'] = $item['value'];
            } else {
                $fretes[$mes][$item['status']]['valor'] += $item['value'];
            }

            if (empty($fretes[$mes]['total'])) $fretes[$mes]['total'] = 0;
            if ($item['status'] == 'aberto') $fretes[$mes]['total'] += $item['value'];
            if ($item['status'] == 'pago') $fretes[$mes]['total'] -= $item['value'];
        }

        return $fretes;
    }

    public function quinzena($cls, $mes, $ano, $id = null)
    {
        $id = $id ?? id_usuario_atual();
        $abertoQuinzena2 = [];
        $abertoQuinzena1 = [];
        $pagoQuinzena2 = [];
        $pagoQuinzena1 = [];

        $todosFretes = $cls->newQuery()
            ->where('user_id', '=', $id)
            ->whereMonth('created_at', $mes)
            ->whereYear('created_at', $ano)
            ->orderBy('created_at', 'ASC')
            ->get(['status', 'value', 'created_at']);

        foreach ($todosFretes as $item) {
            $dia = date('d', strtotime($item['created_at']));

            if ($item->status == 'aberto') {
                if ($dia > 15) {
                    array_push($abertoQuinzena2, $item['value']);
                } else {
                    array_push($abertoQuinzena1, $item['value']);
                }
            }

            if ($item->status == 'pago') {
                if ($dia > 15) {
                    array_push($pagoQuinzena2, $item['value']);
                } else {
                    array_push($pagoQuinzena1, $item['value']);
                }
            }

        }

        return [
            'aberto_quinzena1' => array_sum($abertoQuinzena1),
            'aberto_quinzena2' => array_sum($abertoQuinzena2),
            'pago_quinzena1' => array_sum($pagoQuinzena1),
            'pago_quinzena2' => array_sum($pagoQuinzena2)
        ];
    }
}
