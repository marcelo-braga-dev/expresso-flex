<?php
namespace App\Service\Lojas;

use App\Models\LojasClientes;

class LojasService
{
    public function getLojasCliente(int $id)
    {
        $lojasClientes = new LojasClientes();

        $lojas = $lojasClientes->query()
            ->where('user_id', '=', $id)
            ->where('status', '=', '1')
            ->orderBy('id', 'DESC')
            ->get();

        return $lojas;
    }
}
