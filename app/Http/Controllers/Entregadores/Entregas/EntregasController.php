<?php

namespace App\Http\Controllers\Entregadores\Entregas;

use App\Http\Controllers\Controller;
use App\Models\DestinatarioRecebedor;
use App\Models\Pacotes;
use App\src\Pacotes\Pacote;
use App\src\Pacotes\Status\DestinatarioAusente;
use App\src\Pacotes\Status\EntregaCanceladaEntregador;
use App\src\Pacotes\Status\EntregaFinalizado;
use App\src\Pacotes\Status\EntregaIniciado;
use App\src\Pacotes\Status\PerdidoEntregador;
use Illuminate\Http\Request;

class EntregasController extends Controller
{
    public function index()
    {
        $status = new EntregaIniciado();

        $pacotes = (new Pacotes())->newQuery()
            ->where([
                ['status', '=', $status->getStatus()],
                ['entregador', '=', id_usuario_atual()]
            ])
            ->orderBy('cep', 'ASC')
            ->get();

        return view('pages.entregadores.entregas.index', compact('pacotes'));
    }

    public function show($id)
    {
        $pacote = (new Pacotes())->newQuery()->find($id);

        return view('pages.entregadores.entregas.show', compact('pacote'));
    }

    public function edit($id)
    {
        $pacote = (new Pacotes())->newQuery()->find($id);

        return view('pages.entregadores.entregas.edit', compact('pacote'));
    }

    public function update(Request $request, $id)
    {
        $imagem = null;

        if (!empty($request->imagem)) $imagem = $request->imagem->store('images');

        (new DestinatarioRecebedor())->newQuery()
            ->create([
                'pacotes_id' => $id,
                'recebedor' => $request->recebedor,
                'nome' => $request->nome_recebedor,
                'documento' => $request->documento_recebedor,
                'observacoes' => $request->observacoes,
                'img_pacote' => $imagem
            ]);

        $pacote = new Pacote(new EntregaFinalizado());
        $pacote->finalizar($id);

        return redirect()->route('entregadores.entregas.index');
    }

    public function cancel($id)
    {
        (new Pacotes())->newQuery()->findOrFail($id);

        return view('pages.entregadores.entregas.cancelar-entrega', compact('id'));
    }

    public function destroy($id, Request $request)
    {
        if ($request->motivo_cancelamento == 'destinatario_ausente') {
            (new DestinatarioAusente())->update($id, $request->texto_cancelamento);
        }

        if ($request->motivo_cancelamento == 'entregador_cancelou') {
            (new EntregaCanceladaEntregador())->update($id, $request->texto_cancelamento);
        }

        if ($request->motivo_cancelamento == 'perda_pacote') {
            (new PerdidoEntregador())->update($id, $request->texto_cancelamento);
        }

        modalSucesso('Entrega cancelada com sucesso!');
        return redirect()->route('entregadores.entregas.index');
    }
}
