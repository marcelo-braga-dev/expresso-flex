<?php

namespace App\Http\Controllers\Clientes\Pacotes;

use App\Http\Controllers\Controller;
use App\Models\DestinatarioRecebedor;
use App\Models\FretesRealizados;
use App\Models\Pacotes;
use App\Models\PacotesHistoricos;
use App\Service\PesquisarPacoteService;
use Illuminate\Http\Request;

class HistoricoPacotesController extends Controller
{
    public function index()
    {
        $Pacotes = new Pacotes();

        $pacotes = [];

        $_pacotes = $Pacotes->query()
            ->where('user_id', '=', id_usuario_atual())
            ->orderBy('updated_at', 'DESC')
            ->get();

        foreach ($_pacotes as $arg){
            $data = date('m/y', strtotime($arg->updated_at));

            $pacotes[$data][] = $arg->updated_at;
        }

        return view('pages.clientes.pacotes.historico.index', compact('pacotes'));
    }

    public function dias(Request $request)
    {
        $Pacotes = new Pacotes();

        $pacotes = [];
        $mes = date('m', strtotime($request->data));
        $ano = date('Y', strtotime($request->data));

        $_pacotes = $Pacotes->query()
            ->where('user_id', '=', id_usuario_atual())
            ->whereMonth('updated_at', $mes)
            ->whereYear('updated_at', $ano)
            ->orderBy('updated_at', 'DESC')
            ->get();

        foreach ($_pacotes as $arg){
            $data = date('d/m/y', strtotime($arg->updated_at));

            $pacotes[$data][] = $arg->updated_at;
        }

        return view('pages.clientes.pacotes.historico.dias', compact('pacotes'));
    }

    public function pacotes(Request $request)
    {
        $Pacotes = new Pacotes();

        $dia = $request->data;
        $data = date('Y-m-d', strtotime($request->data));

        $pacotes = $Pacotes->query()
            ->where('user_id', '=', id_usuario_atual())
            ->whereDate('updated_at', $data)
            ->get();

        return view('pages.clientes.pacotes.historico.pacotes', compact('pacotes', 'dia'));
    }
}
