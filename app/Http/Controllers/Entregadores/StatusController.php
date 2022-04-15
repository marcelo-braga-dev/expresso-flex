<?php

namespace App\Http\Controllers\Entregadores;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(Pacotes $encomendas)
    {
        $todasEncomendas = $encomendas->query()->orderBy('id','desc')->get();

        return view('pages.pacotes.historico-pacotes', compact('todasEncomendas')); //
    }
}
