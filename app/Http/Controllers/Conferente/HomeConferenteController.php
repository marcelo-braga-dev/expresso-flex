<?php

namespace App\Http\Controllers\Conferente;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Pacotes\ConferenteController;
use App\Models\Pacotes;
use Illuminate\Http\Request;

class HomeConferenteController extends Controller
{
    public function index()
    {
        $pacotes = new Pacotes();

        $pacotes = $pacotes->query()
            ->where('status', '=', 'pacote_base')
            ->orderBy('updated_at', 'DESC')
            ->get();

            return view('pages.conferente.home');
    }
}
