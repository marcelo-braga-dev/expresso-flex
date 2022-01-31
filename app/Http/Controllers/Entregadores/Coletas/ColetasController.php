<?php

namespace App\Http\Controllers\Entregadores\Coletas;

use App\Http\Controllers\Controller;
use App\Models\LojasClientes;
use App\Models\SolicitacaoRetiradas;
use App\Service\ColetaService;
use App\src\Coletas\Coleta;
use App\src\Coletas\Status\Aceito;
use App\src\Coletas\Status\Finalizado;
use Illuminate\Http\Request;

class ColetasController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $lojasClientes = new LojasClientes();

        $clientes = [];

        $lojas = $lojasClientes->query()
            ->where('status', '=', '1')
            ->get();

        foreach ($lojas as $loja) {
            $clientes[$loja->user_id]['user_id'] = $loja->user_id;

            $clientes[$loja->user_id]['lojas'][] = [
                'id' => $loja->id,
                'name' => $loja->nome
            ];
        }

        return view('pages.entregadores.coletas.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $coleta = new Coleta(new Aceito());
        $coleta->executar($request->id);

        return redirect()->route('entregadores.coletas-abertas.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $status = new Finalizado();

        $coleta = new SolicitacaoRetiradas();
        $coleta->aletarStatus($request->id_coleta, $status->getStatus());

        return redirect()->route('entregadores.coletas-abertas.index');
    }

    public function destroy($id)
    {
        //
    }
}
