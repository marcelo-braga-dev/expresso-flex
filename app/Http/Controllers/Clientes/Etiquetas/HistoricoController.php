<?php

namespace App\Http\Controllers\Clientes\Etiquetas;

use App\Http\Controllers\Controller;
use App\Models\Etiquetas;
use Illuminate\Http\Request;

class HistoricoController extends Controller
{
    public function index()
    {
        $etiquetas = Etiquetas::query()
            ->where('user_id', '=', id_usuario_atual())
            ->orderBy('id', 'DESC')
            ->get();

        return view('pages.clientes.etiquetas.historico.index', compact('etiquetas'));
    }
}
