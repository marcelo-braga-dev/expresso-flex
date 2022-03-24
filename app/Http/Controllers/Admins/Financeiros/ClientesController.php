<?php

namespace App\Http\Controllers\Admins\Financeiros;

use App\Models\FretesRealizados;
use App\Service\FinanceiroService;
use Illuminate\Http\Request;

class ClientesController
{
    public function index(FinanceiroService $financeiroService)
    {
        print_pre('Em manutencao');
        $fretesRealizados = FretesRealizados::get();

        $clientes = $financeiroService->getUsuarios($fretesRealizados);

        return view('pages.admin.financeiro.clientes.todos-clientes', compact('clientes'));
    }

    public function historicoMes(Request $request)
    {
        $financeiroService = new FinanceiroService();

        $user = $request->id;

        $fretesRealizados = FretesRealizados::where('user_id', '=', $user)->get();

        $fretes = $financeiroService->getHistoricoFinanceiro($fretesRealizados);

        return view('pages.admin.financeiro.clientes.mes', compact('fretes', 'user'));
    }

    public function historicoQuinzena(Request $request, FinanceiroService $financeiroService)
    {
        $user = $request->id;

        $clsComissoesEntregadores = new FretesRealizados;

        $fretes = $financeiroService->getHistoricoQuinzena($clsComissoesEntregadores, $request);

        return view('pages.admin.financeiro.clientes.quinzena', compact('fretes', 'user'));
    }

    public function historicoDetalhesMes(Request $request)
    {
        $financeiroService = new FinanceiroService();
        $fretesRealizados = new FretesRealizados();

        $user = $request->id;

        $fretes = $financeiroService->getInfoQuinzena($fretesRealizados, $request);

        return view('pages.admin.financeiro.clientes.detalhes-mes', compact('fretes', 'user'));
    }

    public function pagamentoDinheiro(Request $request, FinanceiroService $financeiroService)
    {
        $fretesRealizados = new FretesRealizados();

        $financeiroService->setPagamentoDinheiro($fretesRealizados, $request);

        return redirect()->back();
    }
}
