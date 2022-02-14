<?php

namespace App\Http\Controllers\Clientes\Pacotes;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use Illuminate\Http\Request;

class PesquisarPacotesController extends Controller
{
    public function index()
    {
        return view('pages.clientes.pacotes.pesquisar.index');
    }

    public function pesquisar(Request $request)
    {
        $Pacotes = new Pacotes();

        $infoPacotePesquisa = $Pacotes->query()
            ->where('rastreio', '=', $request->id)
            ->where('user_id', '=', id_usuario_atual())
            ->first();

        if (empty($infoPacotePesquisa)) {
            session()->flash('erro', 'Pacote com código de rastreio "' .
                $request->id . '" não foi encontrado.');

            return redirect()->back();
        }

        return redirect()->route('clientes.pacotes.show', $infoPacotePesquisa->id);
    }
}
