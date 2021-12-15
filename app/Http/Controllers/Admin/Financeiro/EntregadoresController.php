<?php

namespace App\Http\Controllers\Admin\Financeiro;

use App\Http\Controllers\Controller;
use App\Models\ComissoesEntregadores;
use App\Service\FinanceiroService;
use Illuminate\Http\Request;

class EntregadoresController extends Controller
{
    public function index(FinanceiroService $financeiroService)
    {
        $fretesRealizados = ComissoesEntregadores::get();

        $entregadores = $financeiroService->getUsuarios($fretesRealizados);

        return view('pages.admin.financeiro.entregadores.todos-entregadores', compact('entregadores'));
    }

    public function historicoMes(Request $request, FinanceiroService $financeiroService)
    {
        $user = $request->id;

        $fretesRealizados = ComissoesEntregadores::where('user_id', '=', $user)->get();

        $fretes = $financeiroService->getHistoricoFinanceiro($fretesRealizados);

        return view('pages.admin.financeiro.entregadores.mes', compact('fretes', 'user'));
    }

    public function historicoQuinzena(Request $request, FinanceiroService $financeiroService)
    {
        $user = $request->id;

        $clsComissoesEntregadores = new ComissoesEntregadores;

        $fretes = $financeiroService->getHistoricoQuinzena($clsComissoesEntregadores, $request);

        return view('pages.admin.financeiro.entregadores.quinzena', compact('fretes', 'user'));
    }

    public function historicoDetalhesMes(Request $request, FinanceiroService $financeiroService)
    {
        $fretesRealizados = new ComissoesEntregadores();

        $user = $request->id;

        $fretes = $financeiroService->getInfoQuinzena($fretesRealizados, $request);

        return view('pages.admin.financeiro.entregadores.detalhes-mes', compact('fretes', 'user'));
    }

    public function pagamentoDinheiro(Request $request, FinanceiroService $financeiroService)
    {
        $fretesRealizados = new ComissoesEntregadores();
        
        $financeiroService->setPagamentoDinheiro($fretesRealizados, $request);

        return redirect()->back();
    }
}
