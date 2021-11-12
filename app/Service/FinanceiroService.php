<?php

namespace App\Service;

class FinanceiroService
{
    public function getHistoricoFinanceiro($arg)
    {
        $fretes = [];
        
        foreach ($arg as $var) {
            $mes = date('m/Y', strtotime($var['created_at']));

            $fretes[$mes]['mes'] = date('m', strtotime($var['created_at']));
            $fretes[$mes]['ano'] = date('Y', strtotime($var['created_at']));

            if (empty($fretes[$mes][$var['status']]['valor'])) {

                $fretes[$mes][$var['status']]['status'] = $var['status'];
                $fretes[$mes][$var['status']]['valor'] = $var['value'];
            } else {
                $fretes[$mes][$var['status']]['valor'] += $var['value'];
            }

            if (empty($fretes[$mes]['total'])) $fretes[$mes]['total'] = 0;
            if ($var['status'] == 'aberto') $fretes[$mes]['total'] += $var['value'];
            if ($var['status'] == 'pago') $fretes[$mes]['total'] -= $var['value'];
        }

        return $fretes;
    }

    public function getHistoricoMensal($request, $todosFretes)
    {
        $fretes = [];
        $fretes['pacotes'] = [];

        $totalSP = 0;
        $totalGSP = 0;
        $totalValor = 0;
        $totalPacotes = 0;
        $pacotes_sp = 0;
        $pacotes_g_sp = 0;
        $valores_pagos = 0;
        $valores_receber = 0;        

        $fretes['mes'] = $request->mes;
        $fretes['ano'] = $request->ano;

        foreach ($todosFretes as $var) {
            $data = date('d/m/y', strtotime($var['created_at']));

            $fretes['pacotes'][$data]['dia'] = date('d', strtotime($var['created_at']));

            $fretes['pacotes'][$data][$var['regiao']][] = $var['regiao'];

            if (empty($fretes['pacotes'][$data]['valor_total'])) {
                $fretes['pacotes'][$data]['valor_total'] = 0;
            }
            $fretes['pacotes'][$data]['valor_total'] += $var['value'];

            if ($var['regiao'] == 'sao_paulo') {
                $totalSP += $var['value'];
                $pacotes_sp++;
            }
            if ($var['regiao'] == 'grande_sao_paulo') {
                $totalGSP += $var['value'];
                $pacotes_g_sp++;
            }

            if ($var['status'] == 'pago') {
                $valores_pagos += $var['value'];
            }

            if ($var['status'] == 'aberto') {
                $valores_receber += $var['value'];
            }

            $totalValor += $var['value'];
            $totalPacotes++;
        }

        // Totais
        $total = [
            'valor_sp' => number_format($totalSP, 2, ',', '.'),
            'valor_g_sp' => number_format($totalGSP, 2, ',', '.'),
            'valor_total' => number_format($totalValor, 2, ',', '.'),
            'valor_pago' => number_format($valores_pagos, 2, ',', '.'),
            'valor_receber' => number_format($valores_receber, 2, ',', '.'),
            'valor_pagar' => $valores_receber,
            'total_pacotes' => $totalPacotes,
            'pacotes_sp' => $pacotes_sp,
            'pacotes_g_sp' => $pacotes_g_sp
        ];

        return ['fretes' => $fretes, 'total' => $total];
    }

    public function getUsuarios($fretesRealizados)
    {
        $entregadores = [];

        foreach ($fretesRealizados as $fretes) {
            $entregadores[$fretes->user_id]['user_id'] = $fretes->user_id;
            
            $entregadores[$fretes->user_id]['pacotes'][] = $fretes->user_id;

            if (empty($entregadores[$fretes->user_id]['em_aberto'])) $entregadores[$fretes->user_id]['em_aberto'] = 0;
            
            if ($fretes->status == 'aberto') {
                $entregadores[$fretes->user_id]['em_aberto'] += $fretes->value;
            }             
        }

        return $entregadores;
    }
}
