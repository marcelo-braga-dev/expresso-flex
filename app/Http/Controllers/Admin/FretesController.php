<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrecosFretes;
use App\Models\User;
use App\Service\FretesService;
use Illuminate\Http\Request;

class FretesController extends Controller
{
    public function editaPrecoClientes(Request $request)
    {
        $precosFretes = new PrecosFretes();

        $cliente['sao_paulo'] = 0;
        $cliente['grande_sao_paulo'] = 0;

        $precos = $precosFretes->query()
            ->where('user_id', '=', $request->id)
            ->get();

        $cliente['user_id'] = $request->id;

        if (!$precos->isEmpty()) {
            foreach ($precos as $dados) {

                $cliente[$dados->meta_key] = $dados->value;
            }
        }

        return view('pages.admin.fretes.editar-precos', compact('cliente'));
    }

    public function atualizaPrecoClientes(Request $request)
    {
        $fretesService = new FretesService();

        $tipo = $fretesService->setPrecosFretes($request, $request->id);

        session()->flash('sucesso', 'Valor do frete atualizado com sucesso.');

        if ($tipo == 'cliente') return redirect()->route('admin.usuarios.clientes.tabela');
        if ($tipo == 'entregador') return redirect()->route('admin.usuarios.entregadores.tabela');
    }
}
