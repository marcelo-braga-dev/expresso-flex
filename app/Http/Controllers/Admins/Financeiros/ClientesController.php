<?php

namespace App\Http\Controllers\Admins\Financeiros;

use App\Models\FretesRealizados;
use App\Service\FinanceiroService;
use Illuminate\Http\Request;

class ClientesController
{
    public function index(FinanceiroService $financeiroService)
    {
        $fretesRealizados = (new FretesRealizados())->newQuery()->get();

        $clientes = $financeiroService->getUsuarios($fretesRealizados);

        return view('pages.admins.financeiros.clientes.index', compact('clientes'));
    }

    public function mes($id)
    {
        $financeiroService = new \App\Service\Clientes\Financeiro\FinanceiroService();
        $fretes = $financeiroService->historicoMensal(new FretesRealizados(), $id);

        return view('pages.admins.financeiros.clientes.mes', compact('fretes', 'id'));
    }

    public function quinzena(Request $request, $id)
    {
        $mes = $request->mes;
        $ano = $request->ano;
        $financeiroService = new \App\Service\Clientes\Financeiro\FinanceiroService();
        $fretes = $financeiroService->quinzena($mes, $ano, $id);

        return view('pages.admins.financeiros.clientes.quinzena',
            compact('fretes', 'id', 'mes', 'ano'));
    }

    public function show(Request $request)
    {
        $financeiroService = new FinanceiroService();
        $fretesRealizados = new FretesRealizados();

        $user = $request->id;

        $fretes = $financeiroService->getInfoQuinzena($fretesRealizados, $request);

        return view('pages.admins.financeiros.clientes.show',
            compact('fretes', 'user'));
    }

    public function pago($id, Request $request)
    {
        (new FinanceiroService)->setPagamentoDinheiro(new FretesRealizados(), $request, $id);

        return redirect()->back();
    }
}
