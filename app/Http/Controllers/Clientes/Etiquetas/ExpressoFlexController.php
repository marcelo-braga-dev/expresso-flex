<?php

namespace App\Http\Controllers\Clientes\Etiquetas;

use App\Http\Controllers\Controller;
use App\Models\Etiquetas;
use App\Models\LojasClientes;
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
        $novo = new Novo();
        $origem = new ExpressoFlex();

        $etiquetas = Etiquetas::query()
            ->where([
                ['user_id', '=', id_usuario_atual()],
                ['status', '=', $novo->getStatus()],
                ['origem', '=', $origem->getOrigem()]])
            ->orderBy('id', 'DESC')
            ->paginate();

        return view('pages.clientes.etiquetas.expressoflex.index', compact('etiquetas'));
    }

    public function create()
    {
        $lojasClientes = new LojasClientes();
        $lojas = $lojasClientes->lojas(id_usuario_atual());

        return view('pages.clientes.etiquetas.expressoflex.create', compact('lojas'));
    }

    public function store(Request $request)
    {
        $etiqueta = new GerarEtiqueta();
        $etiqueta->gerar($request);

        return redirect()->route('clientes.etiquetas.expressoflex.index');
    }

    public function show($id)
    {
        $etiqueta = new VisualizarEtiqueta();
        $etiqueta->visualizar($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $impresso = new Impressa();

        $etiqueta = new Etiquetas();
        $etiqueta->atualizarStatus($id, $impresso->getStatus());

        return redirect()->back();

    }

    public function destroy($id)
    {
        //
    }
}
