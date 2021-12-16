<?php

namespace App\Http\Controllers\Admin\Coletas;

use App\Http\Controllers\Controller;
use App\Models\MetaValues;
use App\Models\Pacotes;
use App\Models\SolicitacaoRetiradas;
use Illuminate\Http\Request;

class ColetasController extends Controller
{
    public function historico()
    {
        $solicitacaoRetiradas = new SolicitacaoRetiradas();

        $solicitacoes = [];

        $_solicitacoes =
            $solicitacaoRetiradas
            //->where('entregador', '=', id_usuario_atual())
            ->orderBy('updated_at', 'DESC')
            ->get();

        foreach ($_solicitacoes as $arg) {
            $data = date('d/m/y', strtotime($arg->updated_at));

            $solicitacoes[$data][] = $arg->updated_at;
        }

        return view('pages.admin.coletas.historico-coletas', compact('solicitacoes'));
    }

    public function historicoPacotesColetadosDia(Request $request)
    {
        $clsPacotes = new Pacotes();

        $pacotes = $clsPacotes->query()
        ->where('coleta', '=', $request->id)
        ->orderBy('updated_at', 'DESC')
        ->get();
        
        return view('pages.admin.coletas.historico-pacotes-coletados-dia', compact('pacotes'));
    }

    // Historico de coletas
    public function historicoDiario(Request $request)
    {
        $solicitacaoRetiradas = new SolicitacaoRetiradas();

        $pacotes = [];
        $dia = $request->data;

        $data = $request->data;
        $data = date('Y-m-d', strtotime($request->data));

        $solicitacoes = $solicitacaoRetiradas->query()
            ->whereDate('updated_at', $data)
            ->orderBy('updated_at', 'DESC')
            ->get();
            
        return view('pages.admin.coletas.historico-dia-coletas', compact('solicitacoes', 'dia'));
    }

    public function config(MetaValues $metaValues)
    {
        $data = [];

        $metas = $metaValues->query()->where('meta_id', '=', 7)->get();

        foreach ($metas as $meta) {
            $data[$meta->meta_key] = $meta->value;
        }

        return view('pages.admin.coletas.config-coletas', compact('data'));
    }

    public function update(Request $request, MetaValues $metaValues)
    {
        if (!empty($request->horario_limite_coleta)) {

            $metaValues->updateOrInsert(
                ['meta_key' => 'horario_limite', 'meta_id' => 7],
                ['value' => $request->horario_limite_coleta]
            );

            session()->flash('sucesso', 'Informação atualizada com sucesso.');
        }

        return redirect()->back();
    }
}
