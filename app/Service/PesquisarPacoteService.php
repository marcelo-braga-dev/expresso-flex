<?php

namespace App\Service;

use App\Models\Pacotes;

class PesquisarPacoteService
{
    public function getInfoPacotePesquisa(string $rastreio)
    {
        $Pacotes = new Pacotes();

        $infoPacotePesquisa = $Pacotes->query()
            ->where('rastreio', '=', $rastreio)
            ->where('user_id', '=', id_usuario_atual())
            ->first();

        if (empty($infoPacotePesquisa)) {
            session()->flash('erro', 'Pacote com código de rastreio "' .
                $rastreio . '" não foi encontrado.');

            return false;
        }

        return redirect()->route('cliente.pacotes.info-pacote', ['id' => $infoPacotePesquisa->id]);
    }
}
