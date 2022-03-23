<?php

namespace App\Http\Controllers\Entregadores\Financeiro;

use App\Http\Controllers\Controller;
use App\Models\ComissoesEntregadores;
use App\Service\Entregadores\FinanceiroService;

class FinanceiroController extends Controller
{
    public function historicoMensal()
    {
        $financeiroService = new FinanceiroService();
        $fretes = $financeiroService->historicoMensal();

        return view('pages.entregadores.financeiro.meses', compact('fretes'));
    }

    public function historicoQuinzenal($mes, $ano)
    {
        $financeiroService = new FinanceiroService();
        $fretes = $financeiroService->historicoQuinzenal($mes, $ano);

        return view('pages.entregadores.financeiro.quinzena', compact('fretes', 'mes', 'ano'));
    }

    public function show($mes, $ano, $quinzena)
    {
        if ($quinzena < 1 || $quinzena > 2 ) return redirect('/');

        $valores = [];
        $financeiroService = new FinanceiroService();
        $fretes = $financeiroService->historicoQuinzenal($mes, $ano);

        if ($quinzena == 1) {
            $valores['receber'] = $fretes['aberto_quinzena1'];
            $valores['pago'] = $fretes['pago_quinzena1'];
        }

        if ($quinzena == 2) {
            $valores['receber'] = $fretes['aberto_quinzena2'];
            $valores['pago'] = $fretes['pago_quinzena2'];
        }

        $operadorDia = '<=';
        if ($quinzena == 2) $operadorDia = '>';

        $comissoesEntregadores = new ComissoesEntregadores();
        $entregas = $comissoesEntregadores->newQuery()
            ->where('user_id', '=', id_usuario_atual())
            ->whereMonth('created_at', '=', $mes)
            ->whereYear('created_at', '=', $ano)
            ->whereDay('created_at', $operadorDia, 15)
            ->orderBy('created_at', 'ASC')
            ->get();

        $faturamentos = [];
        foreach ($entregas as $faturado) {
            $data = date('d/m/y', strtotime($faturado->created_at));
            $faturamento[$data][] = $faturado->value;
            $faturamentos[$data] = array_sum($faturamento[$data]);
        }

        return view('pages.entregadores.financeiro.show',
            compact('valores', 'entregas', 'faturamentos', 'mes', 'ano'));
    }
}
