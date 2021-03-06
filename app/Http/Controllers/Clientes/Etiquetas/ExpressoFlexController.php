<?php

namespace App\Http\Controllers\Clientes\Etiquetas;

use App\Http\Controllers\Controller;
use App\Models\Etiquetas;
use App\Models\LojasClientes;
use App\src\Etiquetas\Etiqueta;
use App\src\Etiquetas\ExpressoFlex\GerarEtiqueta;
use App\src\Etiquetas\ExpressoFlex\PDF\VisualizarEtiqueta;
use App\src\Etiquetas\Status\Impressa;
use App\src\Etiquetas\Status\Novo;
use App\src\Pacotes\Origens\ExpressoFlex\ExpressoFlex;
use Illuminate\Http\Request;

class ExpressoFlexController extends Controller
{
    public function index()
    {
        $novo = new Impressa();
        $origem = new ExpressoFlex();

        $etiquetas = Etiquetas::query()
            ->where([
                ['user_id', '=', id_usuario_atual()],
                ['status', '!=', $novo->getStatus()],
                ['origem', '=', $origem->getOrigem()]])
            ->orderBy('id', 'DESC')
            ->paginate();

        $status = (new Etiqueta())->getStatus();

        return view('pages.clientes.etiquetas.expressoflex.index', compact('etiquetas', 'status'));
    }

    public function create()
    {
        $lojasClientes = new LojasClientes();
        $lojas = $lojasClientes->lojasAtivas(id_usuario_atual());

        return view('pages.clientes.etiquetas.expressoflex.create', compact('lojas'));
    }

    public function store(Request $request)
    {
        $etiqueta = new GerarEtiqueta();
        $etiqueta->gerar($request);

        modalSucesso('Etiqueta cadastrada com sucesso!');
        return redirect()->route('clientes.etiquetas.expressoflex.index');
    }

    public function show($id,Request $request)
    {
        if(empty($request->etiquetas)) {
            modalErro('Selecione as etiquetas.');
            return redirect()->back();
        }

        if ($request->impresso) {
            foreach ($request->etiquetas as $id) {
                $impresso = new Impressa();

                $etiqueta = new Etiquetas();
                $etiqueta->atualizarStatus($id, $impresso->getStatus());
            }
            modalSucesso('Ação realizada com sucesso!');
            return redirect()->back();
        }

        (new VisualizarEtiqueta())->visualizar($request->etiquetas);
    }

    public function update(Request $request, $id)
    {
        $impresso = new Impressa();

        $etiqueta = new Etiquetas();
        $etiqueta->atualizarStatus($id, $impresso->getStatus());

        return redirect()->back();

    }
}
