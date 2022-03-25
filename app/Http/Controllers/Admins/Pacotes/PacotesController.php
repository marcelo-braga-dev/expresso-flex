<?php

namespace App\Http\Controllers\Admins\Pacotes;

use App\Models\DestinatarioRecebedor;
use App\Models\FretesRealizados;
use App\Models\Pacotes;
use App\Models\PacotesHistoricos;
use App\Service\Pacotes\PesquisarPacote;
use Illuminate\Http\Request;

class PacotesController
{
    public function show($id)
    {
        $historicos = [];

        $pacotes = new Pacotes();
        $pacote = $pacotes->newQuery()->find($id);

        $destinatarioRecebedor = new DestinatarioRecebedor;
        $recebedor = $destinatarioRecebedor->newQuery()
            ->where('pacotes_id', '=', $pacote->id)->first();

        $pacotesHistoricos = new PacotesHistoricos;
        $dadosHistoricos = $pacotesHistoricos->newQuery()
            ->where('pacotes_id', '=', $pacote->id)->get();

        foreach ($dadosHistoricos as $value) {
            $historicos[] = [
                'status' => $value->value,
                'data' => date('d/m/y H:i', strtotime($value->created_at))
            ];
        }

        $frete = FretesRealizados::query()->where('pacotes_id', '=', $pacote->id)->first();

        return view('pages.admins.pacotes.show', compact('pacote', 'recebedor', 'historicos', 'frete'));
    }

    public function search(Request $request)
    {
        if (!empty($request->codigo)) {
            $pesquisarPacote = new PesquisarPacote();
            $id = $pesquisarPacote->pesquisar($request->codigo);

            if (!empty($id)) return redirect()->route('admins.pacote.show', $id);
            modalErro('Não foi enconrado nenhum pacote com essas informações.');
        }
        return view('pages.admins.pacotes.search');
    }
}
