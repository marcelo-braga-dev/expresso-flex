<?php

namespace App\Http\Controllers\Conferentes\Checkin;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use App\src\Pacotes\Pacote;
use App\src\Pacotes\Status\Base;
use App\src\Pacotes\Status\Coletado;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    public function index()
    {
        $status = new Coletado();

        $pacotes = (new Pacotes())->newQuery()
            ->where('entregador', '!=', '')
            ->where('status', '=', $status->getStatus())
            ->orderBy('updated_at', 'DESC')
            ->get(['id', 'entregador']);

        $entregadores = [];
        foreach ($pacotes as $item) {
            $entregadores[$item->entregador][] = $item->entregador;
        }

        return view('pages.conferente.checkin.index', compact('entregadores'));
    }

    public function show($id)
    {
        $status = new Coletado();

        $pacotes = (new Pacotes())->newQuery()
            ->where('entregador', '=', $id)
            ->where('status', '=', $status->getStatus())
            ->orderBy('updated_at', 'DESC')
            ->get();

        return view('pages.conferente.checkin.show', compact('id', 'pacotes'));
    }

    public function create(Request $request)
    {
        $pacote = new Pacote(new Base());
        $pacote->alterarStatus($request, id_usuario_atual());

        return redirect()->route('conferentes.checkin.index');
    }
}
