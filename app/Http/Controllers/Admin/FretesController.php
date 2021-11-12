<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrecosFretes;
use App\Models\User;
use App\Service\FretesService;
use Illuminate\Http\Request;

class FretesController extends Controller
{
    // Entregadores
    public function tabela($tipo)
    {
        $users = User::where('tipo', '=', $tipo)->get();

        foreach ($users as $dados) {
            $usuarios[$dados->id]['user_id'] = $dados->id;
        }

        $precosFretes = PrecosFretes::where('tipo', '=', $tipo)->get();

        $entregadores = [];

        foreach ($precosFretes as $dados) {

            $usuarios[$dados->user_id]['user_id'] = $dados->user_id;

            if ($dados->meta_key == 'sao_paulo') {
                $usuarios[$dados->user_id]['sao_paulo'] = $dados->value;
            }
            if ($dados->meta_key == 'grande_sao_paulo') {
                $usuarios[$dados->user_id]['grande_sao_paulo'] = $dados->value;
            }
        }

        return view('pages.admin.fretes.tabela', compact('usuarios', 'tipo'));
    }

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

        return redirect()->route('admin.fretes.tabela', $tipo);
    }
}
