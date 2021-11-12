<?php

namespace App\Service\Entregadores;

use App\Models\ComissoesEntregadores;
use App\Models\FretesRealizados;
use App\Models\User;
use App\Service\FinanceiroService;
use Illuminate\Http\Request;

class EntregadoresService
{
    public function getEntregadores()
    {
        $users = new User();

        $entregadores = $users->query()
            ->where('tipo', '=', 'entregador')
            ->where('status', '=', '1')
            ->orderBy('nome', 'ASC')
            ->get(['id', 'nome']);

        return $entregadores;
    }

    public function getFaturamento()
    {
        $comissoesEntregadores = new ComissoesEntregadores();
        $financeiroService = new FinanceiroService();

        $todosFretes = $comissoesEntregadores->query()
            ->where('user_id', '=', id_usuario_atual())
            ->orderBy('created_at', 'DESC')
            ->get();

        $fretes = $financeiroService->getHistoricoFinanceiro($todosFretes);

        return $fretes;
    }
}
