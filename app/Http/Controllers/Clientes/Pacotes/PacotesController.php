<?php

namespace App\Http\Controllers\Clientes\Pacotes;

use App\Http\Controllers\Controller;
use App\Models\DestinatarioRecebedor;
use App\Models\FretesRealizados;
use App\Models\Pacotes;
use App\Models\PacotesHistoricos;
use App\Models\SolicitacaoRetiradas;

class PacotesController extends Controller
{
    public function show($id)
    {
        $pacotes = new Pacotes();
        $pacote = $pacotes->newQuery()->find($id);

        if (empty($pacote) || $pacote->user_id != id_usuario_atual()) {
            return redirect()->back();
        }

        $destinatarioRecebedor = new DestinatarioRecebedor();
        $recebedor = $destinatarioRecebedor->newQuery()
            ->where('pacotes_id', '=', $pacote->id)
            ->first();

        $historicos = (new PacotesHistoricos())->newQuery()
            ->where('pacotes_id', '=', $pacote->id)
            ->get();

        $loja = (new SolicitacaoRetiradas())->newQuery()
            ->find($pacote->coleta, 'loja');
        $loja = $loja->loja;

        $frete = (new FretesRealizados())->newQuery()
            ->where('pacotes_id', '=', $pacote->id)->first();

        return view('pages.clientes.pacotes.show',
            compact('pacote', 'recebedor', 'historicos', 'frete', 'loja'));
    }
}
