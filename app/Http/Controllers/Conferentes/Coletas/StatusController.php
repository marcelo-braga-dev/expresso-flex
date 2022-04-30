<?php

namespace App\Http\Controllers\Conferentes\Coletas;

use App\Models\Pacotes;
use App\src\Pacotes\Status\Base;

class StatusController
{
    public function pacotesBase()
    {
        $status = new Base();

        $pacotes = new Pacotes();
        $pacotes = $pacotes->newQuery()
            ->where('status', '=', $status->getStatus())
            ->get();

        return view('pages.conferente.checkin.pacotes-base', compact('pacotes'));
    }
}
