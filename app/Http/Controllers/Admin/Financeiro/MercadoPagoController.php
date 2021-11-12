<?php

namespace App\Http\Controllers\Admin\Financeiro;

use App\Http\Controllers\Controller;
use App\Models\Meta;
use App\Models\MetaValues;
use App\Service\MetaValues\MetaValuesService;
use Illuminate\Http\Request;

class MercadoPagoController extends Controller
{
    public function index()
    {
        $metas = new MetaValuesService();

        $dados = $metas->getKeysMercadoPago();

        return view('pages.admin.financeiro.conta-mercadopago', compact('dados'));
    }

    public function update(Request $request)
    {
        $metas = new MetaValuesService();

        $metas->setKeysMercadoPago($request);

        return redirect()->back();
    }
}
