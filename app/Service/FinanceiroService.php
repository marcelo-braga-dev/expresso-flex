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

    public function getHistoricoQuinzena($cls, $request)
    {
        $args = $this->getDadosHistoricoQuinzenal($cls, $request);
        
        $fretes = [];
        $fretes['periodos'][1]['aberto'] = 0;
        $fretes['periodos'][2]['aberto'] = 0;
        $fretes['periodos'][1]['pago'] = 0;
        $fretes['periodos'][2]['pago'] = 0;

        foreach ($args as $arg) {
            $dia = date('d', strtotime($arg['created_at']));

            $quinzena = 1;
            if ($dia > 15) $quinzena = 2;

            if ($arg['status'] == 'aberto') $fretes['periodos'][$quinzena]['aberto'] += $arg['value'];
            if ($arg['status'] == 'pago') $fretes['periodos'][$quinzena]['pago'] += $arg['value'];
        }

        $fretes = array_merge($fretes, ['mes' => $request->mes, 'ano' => $request->ano]);
        
        return $fretes;
    }

    // Pagina Detalhes da quinzena
    public function getInfoQuinzena($cls, $request)
    {
        $args = $this->getDadosInfoQuinzena($cls, $request);

        $fretes = [];
        $fretes['faturamento']['aberto'] = 0;
        $fretes['faturamento']['pago'] = 0;

        foreach ($args as $arg) {
            $dia = date('d', strtotime($arg['created_at']));

            if (empty($fretes['dias'][$dia])) $fretes['dias'][$dia] = 0;
            $fretes['dias'][$dia] += $arg['value'];

            if ($arg['status'] == 'aberto') $fretes['faturamento']['aberto'] += $arg['value'];
            if ($arg['status'] == 'pago') $fretes['faturamento']['pago'] += $arg['value'];
        }

        $fretes['faturamento']['total'] = $fretes['faturamento']['aberto'] + $fretes['faturamento']['pago'];

        $fretes = array_merge(
            $fretes,
            ['quinzena' => $request->quinzena, 'mes' => $request->mes, 'ano' => $request->ano]
        );

        return $fretes;
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

    public function setPagamentoDinheiro($cls, $request) {      
        $operador = '<=';
        if ($request->quinzena == 2) $operador = '>';

        $todosFretes = $cls->query()
            ->where('user_id', '=', $request->id)
            ->whereMonth('created_at', $request->mes)
            ->whereYear('created_at', $request->ano)
            ->whereDay('created_at', $operador, 15)
            ->update(['status' => 'pago']);        

        session()->flash('sucesso', 'Confirmação de pagamento realizada com sucesso.');
    }

    private function getDadosInfoQuinzena($cls, $request)
    {
        $user = $request->id;

        $operador = '<=';
        if ($request->quinzena == 2) $operador = '>';

        $todosFretes = $cls->query()
            ->where('user_id', '=', $user)
            ->whereMonth('created_at', $request->mes)
            ->whereYear('created_at', $request->ano)
            ->whereDay('created_at', $operador, 15)
            ->orderBy('created_at', 'ASC')
            ->get(['status', 'value', 'created_at']);

            return $todosFretes;
    }

    private function getDadosHistoricoQuinzenal($cls, $request)
    {
        $todosFretes = $cls->query()
            ->where('user_id', '=', $request->id)
            ->whereMonth('created_at', $request->mes)
            ->whereYear('created_at', $request->ano)
            ->orderBy('created_at', 'ASC')
            ->get(['status', 'value', 'created_at']);

            return $todosFretes;
    }
}
