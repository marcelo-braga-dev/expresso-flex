<?php

namespace App\Http\Controllers\Conferentes\Coletas;

use App\Models\Pacotes;

class StatusController
{
    public function pacotesBase()
    {
        $pacotes = new Pacotes();
        $pacotes = $pacotes->newQuery()->get();

        return view('pages.conferente.checkin.pacotes-base', compact('pacotes'));
    }
}
