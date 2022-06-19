<?php

namespace App\Http\Controllers\Clientes\Financeiros;

use App\Http\Controllers\Controller;
use App\Models\FretesRealizados;
use App\Service\Clientes\Financeiro\FinanceiroService;

class FinanceiroController extends Controller
{
    public function historicoMensal()
    {
        $fretes = (new FinanceiroService())->historicoMensal(new FretesRealizados());

        return view('pages.clientes.financeiro.index', compact('fretes'));
    }

    public function histricoQuinzenal($mes, $ano)
    {
        $fretes = (new FinanceiroService())->quinzena(new FretesRealizados(), $mes, $ano);

        return view('pages.clientes.financeiro.quinzena', compact('fretes', 'mes', 'ano'));
    }

    public function fatura($mes, $ano, $quinzena)
    {
        if ($quinzena < 1 || $quinzena > 2 ) return redirect('/');

        $valores = [];
        $financeiroService = new FinanceiroService();
        $fretes = $financeiroService->quinzena(new FretesRealizados(),$mes, $ano);

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

        $entregas = (new FretesRealizados())->newQuery()
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

        return view('pages.clientes.financeiro.fatura',
            compact('valores', 'entregas', 'faturamentos', 'mes', 'ano'));
    }
}
