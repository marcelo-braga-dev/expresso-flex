<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Enderecos;
use App\Models\LojasClientes;
use App\Service\Lojas\LojasService;
use Illuminate\Http\Request;

class LojasController extends Controller
{
    public function todasLojas()
    {       
        $lojasService = new LojasService();

        $lojas = $lojasService->getLojasCliente(id_usuario_atual());

        return view('pages.cliente.lojas.todas-lojas', compact('lojas'));
    }

    public function novaLoja(Request $request)
    {
        $lojasClientes = new LojasClientes();

        $endereco = $request->endereco;

        $cep = preg_replace('/\D/', '', $endereco['cep']);        

        if (empty($endereco['complemento'])) $endereco['complemento'] = '';
        if (empty($endereco['estado'])) $endereco['estado'] = '';
        if (empty($endereco['latitude'])) $endereco['latitude'] = '';
        if (empty($endereco['longitude'])) $endereco['longitude'] = '';
        
        /*
        if (empty($endereco['cep'])) $endereco['cep'] = '';
        if (empty($endereco['rua'])) $endereco['rua'] = '';
        if (empty($endereco['numero'])) $endereco['numero'] = '';
        if (empty($endereco['bairro'])) $endereco['bairro'] = '';
        if (empty($endereco['cidade'])) $endereco['cidade'] = '';
        */

        $idEndereco = Enderecos::create(
            [
                'cep' => $endereco['cep'],
                'rua' => $endereco['rua'],
                'numero' => $endereco['numero'],
                'complemento' => $endereco['complemento'],
                'bairro' => $endereco['bairro'],
                'cidade' => $endereco['cidade'],
                'estado' => $endereco['estado'],
                'latitude' => $endereco['latitude'],
                'longitude' => $endereco['longitude']
            ]
        );

        $lojasClientes->user_id = id_usuario_atual();
        $lojasClientes->nome = $request->nome;
        $lojasClientes->status = true;
        $lojasClientes->cep = $cep;
        $lojasClientes->celular = $request->celular;
        $lojasClientes->endereco = $idEndereco->id;

        $lojasClientes->push();    

        return redirect()->route('cliente.coleta.pontos-de-coleta');
    }

    public function desativar(Request $request)
    {
        $lojasClientes = new LojasClientes();

        $lojasClientes->query()
            ->where('id', '=', $request->id)
            ->where('user_id', '=', id_usuario_atual())
            ->update(['status' => false]);

        return redirect()->back();
    }
}
