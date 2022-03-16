<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MetaValues;
use App\Models\Pacotes;
use App\Models\PacotesHistoricos;
use Illuminate\Http\Request;

class StatusPacoteController extends Controller
{
    public function index(Request $request)
    {
        $res = [];
        $pacote = Pacotes::where('rastreio', '=', $request->cod)->first('id');

        if (empty($pacote)) {
            return ['error' => '1', 'msg_error' => 'Código de rastreio não encontrado'];
        }

        $historico = PacotesHistoricos::where('pacotes_id', '=', $pacote->id)
            ->orderBy('updated_at', 'ASC')
            ->get(['status', 'value', 'updated_at']);

        if ($historico->isEmpty()) {
            return ['error' => '1', 'msg_error' => 'Não foi encontrado pacote nesse código de rastreio'];
        }

        $metasValues = new MetaValues();

        foreach ($historico as $arg) {
            $res[] = [
                'msg' => $metasValues->newQuery()->where('meta_key', '=', $arg->status)->first('value')->value,
                'status' => $arg->status,
                'data' => date('d/m/y', strtotime($arg['updated_at'])),
                'hora' => date('H:i', strtotime($arg['updated_at']))
            ];
        }
        return $res;
    }
}
