<?php

namespace App\Http\Controllers\Cliente;

use App\Models\DestinatarioRecebedor;
use App\Models\FretesRealizados;
use App\Models\Pacotes;
use App\Models\PacotesHistoricos;
use App\Service\PesquisarPacoteService;
use Illuminate\Http\Request;

class PacotesControllers
{
    public function historicoMes()
    {
        $Pacotes = new Pacotes();

        $pacotes = [];

        $_pacotes = $Pacotes->query()
            ->where('user_id', '=', id_usuario_atual())
            ->where('status', '!=', 'pacote_nova_etiqueta')
            ->orderBy('updated_at', 'DESC')
            ->get();

        foreach ($_pacotes as $arg){
            $data = date('m/y', strtotime($arg->updated_at));
            
            $pacotes[$data][] = $arg->updated_at;
        }

        return view('pages.cliente.pacotes.historico.mes', compact('pacotes'));
    }
    
    public function historicoDia(Request $request)
    {
        $Pacotes = new Pacotes();

        $pacotes = [];
        $mes = date('m', strtotime($request->data));
        $ano = date('Y', strtotime($request->data));

        $_pacotes = $Pacotes->query()
            ->where('user_id', '=', id_usuario_atual())
            ->where('status', '!=', 'pacote_nova_etiqueta')
            ->whereMonth('updated_at', $mes)
            ->whereYear('updated_at', $ano)
            ->orderBy('updated_at', 'DESC')
            ->get();

        foreach ($_pacotes as $arg){
            $data = date('d/m/y', strtotime($arg->updated_at));
            
            $pacotes[$data][] = $arg->updated_at;
        }
        
        return view('pages.cliente.pacotes.historico.dia', compact('pacotes'));
    }

    public function historicoDetalhesDia(Request $request)
    {
        $Pacotes = new Pacotes();

        $pacotes = [];
        $dia = $request->data;

        $data = $request->data;
        $data = date('Y-m-d', strtotime($request->data));

        $pacotes = $Pacotes->query()
            ->where('user_id', '=', id_usuario_atual())
            ->where('status', '!=', 'pacote_nova_etiqueta')
            ->whereDate('updated_at', $data)
            ->get();
        
        return view('pages.cliente.pacotes.historico.dia-detalhes', compact('pacotes', 'dia'));
    }

    public function info(Request $request, DestinatarioRecebedor $destinatarioRecebedor, PacotesHistoricos $pacotesHistoricos)
    {
        $pacote = Pacotes::find($request->id);

        $recebedor = [];
        $historicos = [];

        if (empty($pacote) || $pacote->user_id != id_usuario_atual()) {
            return redirect()->back();
        }

        $dadosRecebedor = $destinatarioRecebedor->query()->where('pacotes_id', '=', $pacote->id)->get();

        foreach ($dadosRecebedor as $value) {
            $recebedor[$value->meta_key] = $value->value;
        }

        $dadosHistoricos = $pacotesHistoricos->query()->where('pacotes_id', '=', $pacote->id)->get();

        foreach ($dadosHistoricos as $value) {
            $historicos[] = [
                'status' => $value->status,
                'obs' => $value->value,
                'data' => $value->created_at
            ];
        }

        $frete = FretesRealizados::query()->where('pacotes_id', '=', $pacote->id)->first();

        return view('pages.cliente.pacotes.info', compact('pacote', 'recebedor', 'historicos', 'frete'));
    }

    public function pesquisar(Request $request)
    {
        if (!empty($request->codigo_pacote_pesquisar)) {
            $pesquisar = new PesquisarPacoteService();

            $infoPesquisa = $pesquisar->getInfoPacotePesquisa($request->codigo_pacote_pesquisar);

            if ($infoPesquisa) return $infoPesquisa;

            return redirect()->back();
        }

        return view('pages.cliente.pacotes.pesquisar');
    }
}
