<?php

namespace App\Http\Controllers\Entregadores\Financeiro;

use App\Http\Controllers\Controller;
use App\Models\ComissoesEntregadores;
use App\Models\FretesRealizados;
use App\Service\Entregadores\EntregadoresService;
use App\Service\FinanceiroService;
use Illuminate\Http\Request;

class FinanceiroController extends Controller
{
    public function receber()
    {
        $entregadoresService = new EntregadoresService();

        $fretes = $entregadoresService->getFaturamento();

        return view('pages.entregadores.financeiro.mes', compact('fretes'));
    }

    public function detalhesMensal(Request $request)
    {
        $financeiroService = new FinanceiroService();
        $comissoesEntregadores = new ComissoesEntregadores();

        $todosFretes = $comissoesEntregadores->query()
            ->where('user_id', '=', id_usuario_atual())
            ->whereMonth('created_at', $request->mes)
            ->whereYear('created_at', $request->ano)
            ->orderBy('created_at', 'ASC')
            ->get();

        $res = $financeiroService->getHistoricoMensal($request, $todosFretes);

        $fretes = $res['fretes'];
        $total = $res['total'];

        return view('pages.entregadores.financeiro.detalhes-mes-receber', compact('fretes', 'total'));
    }
}
