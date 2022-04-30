<?php

namespace App\Http\Controllers\Conferentes\Checkin;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use App\src\Pacotes\Pacote;
use App\src\Pacotes\Status\Base;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    public function index()
    {
        $status = new Base();

        $pacotes = new Pacotes();
        $pacotes = $pacotes->newQuery()
            ->where('status', '=', $status->getStatus())
            ->orderBy('id', 'DESC')
            ->paginate();

        return view('pages.conferente.checkin.index', compact('pacotes'));
    }

    public function create(Request $request)
    {
        $pacote = new Pacote(new Base());
        $pacote->alterarStatus($request);

        return redirect()->route('conferentes.checkin.index');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
