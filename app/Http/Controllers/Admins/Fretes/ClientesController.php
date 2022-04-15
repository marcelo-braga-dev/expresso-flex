<?php

namespace App\Http\Controllers\Admins\Fretes;

use App\Models\PrecosFretes;
use App\Service\FretesService;
use Illuminate\Http\Request;

class ClientesController
{
    public function edit($id)
    {
        $precosFretes = new PrecosFretes();

        $cliente['sao_paulo'] = 0;
        $cliente['grande_sao_paulo'] = 0;

        $precos = $precosFretes->query()
            ->where('user_id', '=', $id)
            ->get();

        $cliente['user_id'] = $id;

        if (!$precos->isEmpty()) {
            foreach ($precos as $dados) {
                $cliente[$dados->meta_key] = $dados->value;
            }
        }

        return view('pages.admins.fretes.clientes.edit', compact('cliente', 'id'));
    }

    public function update(Request $request, $id)
    {
        $fretesService = new FretesService();

        $tipo = $fretesService->setPrecosFretes($request, $id);

        session()->flash('sucesso', 'Valor do frete atualizado com sucesso.');

        if ($tipo == 'cliente') return redirect()->back();
        if ($tipo == 'entregador') return redirect()->back();
    }
}
