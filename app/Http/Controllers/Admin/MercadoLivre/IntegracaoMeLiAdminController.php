<?php

namespace App\Http\Controllers\Admin\MercadoLivre;

use App\Http\Controllers\Controller;
use App\Models\Meta;
use Illuminate\Http\Request;

class IntegracaoMeLiAdminController extends Controller
{
    public function contaPrincipal()
    {
        $meta = Meta::find(4);

        $dados = [];

        $values = $meta->values;

        foreach ($values as $value)
        {
            $dados[$value->meta_key] = $value->value;
        }

        return view('pages.admin.mercadolivre.conta-principal', compact('dados'));
    }

    public function update(Request $request)
    {
        $meta = Meta::find(4);

        $meta->values()
            ->where('meta_key', '=', 'app_id')
            ->update(['value' => $request->app_id]); // id_client_manager_meli

        $meta->values()
            ->where('meta_key', '=', 'client_secret')
            ->update(['value' => $request->client_secret]);// client_secret_manager_meli

        $meta->values()
            ->where('meta_key', '=', 'url_retorno')
            ->update(['value' => $request->url_retorno]) ; // url_retorno_autenticacao_meli

        $meta->values()
            ->where('meta_key', '=', 'url_notificacao')
            ->update(['value' => $request->url_notificacao]); // url_notificacao_meli

        session()->flash('sucesso', 'Conta atualizada com sucesso.');

        return redirect()->back();
    }
}
