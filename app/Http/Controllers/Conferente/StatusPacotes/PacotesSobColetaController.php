<?php

namespace App\Http\Controllers\Conferente\StatusPacotes;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use Illuminate\Http\Request;

class PacotesSobColetaController extends Controller
{
    public function index()
    {
        $Pacotes = new Pacotes();

        $entregadores = [];
        $date = date('Y-m-d');

        $pacotes = $Pacotes->query()
            //->whereDate('updated_at', '=',  $date)
            ->where('entregador', '!=', '')
            ->where('status', '=', 'pacote_coletado')
            ->orderBy('updated_at', 'DESC')
            ->get();

        foreach ($pacotes as $pacote) {
            $entregadores[$pacote->entregador]['id_entregador'] = $pacote->entregador;
            $entregadores[$pacote->entregador]['pacotes'][] = $pacote;
            //$entregadores[$pacote->entregador]['data'] = $pacote->updated_at;
        }

        return view('pages.conferente.pacotes.sob-coleta', compact('entregadores'));
    }
}
