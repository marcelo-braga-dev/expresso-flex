<?php

namespace App\Http\Controllers\Admins\Pacotes;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use App\src\Pacotes\Status\Base;
use App\src\Pacotes\Status\Coletado;
use App\src\Pacotes\Status\EntregaIniciado;
use App\src\Pacotes\Status\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function sobColeta()
    {
        $status = new Coletado();

        $pacotes = $this->getPacotes($status);

        return view('pages.admins.pacotes.status.sendo-coletados.index', compact('pacotes'));
    }

    public function base()
    {
        $status = new Base();
        $pacotes = $this->getPacotes($status);

        return view('pages.admins.pacotes.status.base.index', compact('pacotes'));
    }

    public function sobEntrega()
    {
        $status = new EntregaIniciado();
        $pacotes = $this->getPacotes($status);

        return view('pages.admins.pacotes.status.sendo-entregue.index', compact('pacotes'));
    }

    private function getPacotes(Status $status)
    {
        $pacotes = new Pacotes();
        return $pacotes->newQuery()
            ->where('status', '=', $status->getStatus())
            ->paginate();
    }
}
