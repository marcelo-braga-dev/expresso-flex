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
            ->orderBy('id', 'DESC')
            ->get();
            //->toArray()

        return $lojas;
    }
}
