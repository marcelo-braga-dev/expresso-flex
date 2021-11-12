<?php

namespace App\Http\Controllers\Admin\Financeiro;

use App\Http\Controllers\Controller;
use App\Models\FretesRealizados;
use App\Service\FinanceiroService;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index(FinanceiroService $financeiroService)
    {
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

    public function historicoDetalhesMes(Request $request)
    {
        $financeiroService = new FinanceiroService();
        $fretesRealizados = new FretesRealizados();

        $user = $request->id;

        $todosFretes = $fretesRealizados->query()
            ->where('user_id', '=', $user)
            ->whereMonth('created_at', $request->mes)
            ->whereYear('created_at', $request->ano)
            ->orderBy('created_at', 'ASC')
            ->get();

        $res = $financeiroService->getHistoricoMensal($request, $todosFretes);

        $fretes = $res['fretes'];
        $total = $res['total'];
        
        return view('pages.admin.financeiro.clientes.detalhes-mes', compact('fretes', 'total', 'user'));
    }
}
