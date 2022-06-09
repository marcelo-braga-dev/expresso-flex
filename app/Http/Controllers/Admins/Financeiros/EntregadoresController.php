<?php

namespace App\Http\Controllers\Admins\Financeiros;

use App\Models\ComissoesEntregadores;
use App\Service\FinanceiroService;
use Illuminate\Http\Request;

class EntregadoresController
{
    public function index(FinanceiroService $financeiroService)
    {
        $fretesRealizados = (new ComissoesEntregadores())->newQuery()->get();

        $clientes = $financeiroService->getUsuarios($fretesRealizados);

        return view('pages.admins.financeiros.entregadores.index', compact('clientes'));
    }

    public function mes($id)
    {
        $financeiroService = new \App\Service\Clientes\Financeiro\FinanceiroService();
        $fretes = $financeiroService->historicoMensal(new ComissoesEntregadores(), $id);

        return view('pages.admins.financeiros.entregadores.mes', compact('fretes', 'id'));
    }

    public function quinzena(Request $request, $id)
    {
        $mes = $request->mes;
        $ano = $request->ano;
        $financeiroService = new \App\Service\Clientes\Financeiro\FinanceiroService();
        $fretes = $financeiroService->quinzena(new ComissoesEntregadores(), $mes, $ano, $id);

        return view('pages.admins.financeiros.entregadores.quinzena',
            compact('fretes', 'id', 'mes', 'ano'));
    }

    public function show(Request $request)
    {
        $financeiroService = new FinanceiroService();
        $fretesRealizados = new ComissoesEntregadores();

        $user = $request->id;

        $fretes = $financeiroService->getInfoQuinzena($fretesRealizados, $request);

        return view('pages.admins.financeiros.entregadores.show',
            compact('fretes', 'user'));
    }

    public function pago($id, Request $request)
    {
        (new FinanceiroService)->setPagamentoDinheiro(new FretesRealizados(), $request, $id);

        return redirect()->back();
    }
}
