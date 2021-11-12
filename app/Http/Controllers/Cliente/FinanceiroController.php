<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\ComissoesEntregadores;
use App\Models\FretesRealizados;
use App\Service\Entregadores\EntregadoresService;
use App\Service\FinanceiroService;
use App\src\Financeiro\ClienteFinanceiro;
use Illuminate\Http\Request;

class FinanceiroController extends Controller
{
    public function pagamentos()
    {
        $fretesRealizados = new FretesRealizados();
        $financeiroService = new FinanceiroService();

        $todosFretes = $fretesRealizados->query()
            ->where('user_id', '=', id_usuario_atual())
            ->orderBy('created_at', 'DESC')
            ->get();

        $fretes = $financeiroService->getHistoricoFinanceiro($todosFretes);

        return view('pages.cliente.financeiro.historico-completo', compact('fretes'));
    }

    public function detalhesMensal(Request $request)
    {
        $clienteFinanceiro = new ClienteFinanceiro(); 
        $financeiroService = new FinanceiroService();
        $fretesRealizados = new FretesRealizados();

        
        $todosFretes = $fretesRealizados->query()
        ->where('user_id', '=', id_usuario_atual())
        ->whereMonth('created_at', $request->mes)
        ->whereYear('created_at', $request->ano)
        ->orderBy('created_at', 'ASC')
        ->get();
        
        $res = $financeiroService->getHistoricoMensal($request, $todosFretes);
        
        $fretes = $res['fretes'];
        $total = $res['total'];
        
        // Modal Pagamento
        $idPagamento = 0;
        if ($total['valor_pagar']){
            $desc = 'Pag. Fatura - ' . $fretes['mes'] . ' de ' . $fretes['ano'];

            $idPagamento = $clienteFinanceiro->getModel($total['valor_pagar'], $desc);
        }         

        return view('pages.cliente.financeiro.detalhes-mensal', compact('fretes', 'total', 'idPagamento'));
    }
}
