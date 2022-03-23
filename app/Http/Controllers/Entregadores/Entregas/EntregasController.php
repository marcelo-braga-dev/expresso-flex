<?php

namespace App\Http\Controllers\Entregadores\Entregas;

use App\Http\Controllers\Controller;
use App\Models\DestinatarioRecebedor;
use App\Models\Pacotes;
use App\src\Pacotes\Pacote;
use App\src\Pacotes\Status\EntregaFinalizado;
use App\src\Pacotes\Status\EntregaIniciado;
use Illuminate\Http\Request;

class EntregasController extends Controller
{
    public function index()
    {
        $status = new EntregaIniciado();

        $pacotes = new Pacotes();
        $pacotes = $pacotes->newQuery()
            ->where([
                ['status', '=', $status->getStatus()],
                ['entregador', '=', id_usuario_atual()]
            ])->get();

        return view('pages.entregadores.entregas.index', compact('pacotes'));
    }

    public function show($id)
    {
        $pacotes = new Pacotes();
        $pacote = $pacotes->newQuery()->find($id);

        return view('pages.entregadores.entregas.show', compact('pacote'));
    }

    public function edit($id)
    {
        $pacotes = new Pacotes();
        $pacote = $pacotes->newQuery()->find($id);

        return view('pages.entregadores.entregas.edit', compact('pacote'));
    }

    public function update(Request $request, $id)
    {
        $imagem = null;

        if (!empty($request->imagem)) $imagem = $request->imagem->store('images');

        $recebedor = new DestinatarioRecebedor();
        $recebedor->newQuery()
            ->create([
                'pacotes_id' => $id,
                'recebedor' => $request->recebedor,
                'nome' => $request->nome_recebedor,
                'documento' => $request->documento_recebedor,
                'obsevacoes' => $request->observacoes,
                'img_pacote' => $imagem
            ]);

        $pacote = new Pacote(new EntregaFinalizado());
        $pacote->finalizar($id);

        return redirect()->route('entregadores.entregas.index');
    }

    public function cancel($id)
    {
        $pacotes = new Pacotes();
        $pacote = $pacotes->newQuery()->find($id);

        return view('pages.entregadores.entregas.cancelar-entrega', compact('pacote'));
    }
}
