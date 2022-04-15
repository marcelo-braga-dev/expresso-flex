<?php

namespace App\Http\Controllers\Admins\Pacotes;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use Illuminate\Http\Request;

class HistoricoClientesController extends Controller
{
    public function index()
    {
        $clientes = [];

        $clsPacotes = new Pacotes();
        $pacotes = $clsPacotes->newQuery()->get();

        foreach ($pacotes as $pacote) {
            $clientes[$pacote->user_id] = $pacote->user_id;
        }

        return view('pages.admins.pacotes.clientes.index', compact('clientes'));
    }

    public function meses($id)
    {
        $clsPacotes = new Pacotes();
        $datas = [];

        $pacotes = $clsPacotes->newQuery()
            ->where('user_id', '=', $id)
            ->get();

        foreach ($pacotes as $pacote) {
            $data = date('Y-m', strtotime($pacote->created_at));
            $mes = date('m', strtotime($pacote->created_at));
            $ano = date('Y', strtotime($pacote->created_at));

            $datas[$data] = [
                'mes' => $mes,
                'ano' => $ano
            ];
        }

        return view('pages.admins.pacotes.clientes.mes', compact('datas', 'id'));
    }

    public function dias($id, Request $request)
    {
        $clsPacotes = new Pacotes();

        $datas = [];
        $mes = $request->mes;
        $ano = $request->ano;

        $_pacotes = $clsPacotes->newQuery()
            ->where('user_id', '=', $id)
            ->whereMonth('created_at', $mes)
            ->whereYear('created_at', $ano)
            ->orderBy('created_at', 'DESC')
            ->get();

        foreach ($_pacotes as $arg) {
            $data = date('d/m/y', strtotime($arg->created_at));
            $dia = date('d', strtotime($arg->created_at));

            $datas[$data] = [
                'dia' => $dia,
                'mes' => $mes,
                'ano' => $ano
            ];
        }

        return view('pages.admins.pacotes.clientes.dias', compact('id', 'datas', 'mes', 'ano'));
    }

    public function pacotes($id, Request $request)
    {
        $clsPacotes = new Pacotes();

        $pacotes = [];
        $dia = $request->dia;
        $mes = $request->mes;
        $ano = $request->ano;
        $data = $dia .'/'.$mes.'/'.$ano;

        $pacotes = $clsPacotes->newQuery()
            ->where('user_id', '=', $id)
            ->whereDay('created_at', $dia)
            ->whereMonth('created_at', $mes)
            ->whereYear('created_at', $ano)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('pages.admins.pacotes.clientes.pacotes', compact('id','pacotes', 'data'));
    }
}
