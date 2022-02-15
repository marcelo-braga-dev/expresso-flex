<?php

namespace App\Http\Controllers\Clientes\Financeiros;

use App\Http\Controllers\Controller;
use App\Models\FretesRealizados;
use App\Service\FinanceiroService;
use App\src\Financeiro\ClienteFinanceiro;
use Illuminate\Http\Request;

class FinanceiroController extends Controller
{
    public function index()
    {
        $fretesRealizados = new FretesRealizados();
        $financeiroService = new FinanceiroService();

        $todosFretes = $fretesRealizados->query()
            ->where('user_id', '=', id_usuario_atual())
            ->orderBy('created_at', 'DESC')
            ->get();

        $fretes = $financeiroService->getHistoricoFinanceiro($todosFretes);

        return view('pages.clientes.financeiro.index', compact('fretes'));
    }

    public function quinzena(Request $request)
    {
        $user = id_usuario_atual();
        $fretesRealizados = new FretesRealizados();
        $financeiroService = new FinanceiroService();
        $request->id = $user;

        $fretes = $financeiroService->getHistoricoQuinzena($fretesRealizados, $request);

        return view('pages.cliente.financeiro.quinzena', compact('fretes', 'user'));
    }

    public function fatura(Request $request)
    {
        $financeiroService = new FinanceiroService();
        $fretesRealizados = new FretesRealizados();
        $clienteFinanceiro = new ClienteFinanceiro();

        $user = id_usuario_atual();
        $request->id = $user;

        $fretes = $financeiroService->getInfoQuinzena($fretesRealizados, $request);

        // Modal Pagamento
        $emAberto = $fretes['faturamento']['aberto'];
        $idMercadoPago = 0;
        if ($emAberto) {
            $desc = 'Pag. Fatura ' . $request->quinzena . '° quinz. de ' . $fretes['mes'] . '-' . $fretes['ano'];

            $idMercadoPago = $clienteFinanceiro->getModel($emAberto, $desc);
        }

        return view('pages.cliente.financeiro.fatura', compact('fretes', 'user', 'idMercadoPago'));
    }
}
