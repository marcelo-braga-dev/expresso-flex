<?php

namespace App\Http\Controllers\Entregadores\Coletas;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use App\Models\PacotesHistoricos;
use App\src\Pacotes\Status\Base;
use App\src\Pacotes\Status\Coletado;
use Illuminate\Http\Request;

class HistoricoPacotesController extends Controller
{
    public function index()
    {
        $items = $this->historico();
        $pacotes = [];

        foreach ($items as $item) {
            $data = date('d/m/y', strtotime($item->created_at));
            $pacotes[$data][] = $item->created_at;
        }

        return view('pages.entregadores.coletas.historico-pacotes.index', compact('pacotes'));
    }

    public function show(Request $request)
    {
        $data = date('Y-m-d', strtotime($request->data));

        $items = (new PacotesHistoricos())->query()
            ->where('user_id', '=', id_usuario_atual())
            ->where('status', '=', (new Coletado())->getStatus())
            ->whereDate('created_at', $data)
            ->orderBy('created_at', 'DESC')
            ->get(['pacotes_id', 'created_at', 'status']);

        $todosPacotes = (new Pacotes())->newQuery();
        foreach ($items as $item) {
            $todosPacotes->orWhere('id', '=', $item->pacotes_id);
        }
        $pacotes = $todosPacotes->get();

        $statusColetado = (new Coletado())->getStatus();
        $statusBase = (new Base())->getStatus();

        return view('pages.entregadores.coletas.historico-pacotes.show',
            compact('pacotes', 'statusColetado', 'statusBase'));
    }

    private function historico()
    {
        return (new PacotesHistoricos())->query()
            ->where([['user_id', '=', id_usuario_atual()],
                ['status', '=', (new Coletado())->getStatus()],
            ])
            ->orderBy('created_at', 'DESC')
            ->get(['user_id', 'pacotes_id', 'created_at', 'status']);
    }
}
