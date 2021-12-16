<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Meta;
use App\Models\MetaValues;
use App\Models\Pacotes;
use App\Models\PacotesHistoricos;
use Illuminate\Http\Request;

class StatusPacoteController extends Controller
{
    public function index(Request $request)
    {
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

        $metasValues = MetaValues::where('meta_id', '=', 5)->get(['meta_key', 'value']);

        foreach ($metasValues as $arg) {
            $mgsStatus[$arg->meta_key] = $arg->value;
        }

        foreach ($historico as $arg) {
            if ($arg->status != 'pacote_nova_etiqueta') {
                $res[] =
                    [
                        'status' => $mgsStatus[$arg->status],
                        'msg' => $arg->value,
                        'data' => date('d/m/y', strtotime($arg['updated_at'])),
                        'hora' => date('H:i', strtotime($arg['updated_at']))
                    ];
            }
        }

        return $res;
    }
}
