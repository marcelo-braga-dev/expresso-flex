<?php

namespace App\Http\Controllers\Conferentes\Pacotes;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use App\src\Pacotes\Status\Base;

class NaBaseController extends Controller
{
    public function index()
    {
        $data = date('Y-m-d');

        $status = new Base();
        $pacotes = (new Pacotes())->newQuery()
            ->where('status', '=', $status->getStatus())
            ->whereDate('updated_at', '=', $data)
            ->orderBy('updated_at', 'DESC')
            ->get();

        return view('pages.conferente.pacotes.na-base.index', compact('pacotes'));
    }
}
