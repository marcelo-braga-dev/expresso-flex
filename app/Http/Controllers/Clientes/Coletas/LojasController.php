<?php

namespace App\Http\Controllers\Clientes\Coletas;

use App\Http\Controllers\Controller;
use App\Models\LojasClientes;
use App\Service\Lojas\LojasService;
use App\src\Enderecos\CadastrarEndereco;
use Illuminate\Http\Request;

class LojasController extends Controller
{
    public function index()
    {
        $lojasService = new LojasService();

        $lojas = $lojasService->getLojasCliente(id_usuario_atual());

        return view('pages.clientes.coletas.lojas.index', compact('lojas'));
    }

    public function create()
    {
        return view('pages.clientes.coletas.lojas.create');
    }

    public function store(Request $request)
    {
        $endereco = new CadastrarEndereco();
        $endereco->cep($request->endereco['cep']);
        $endereco->rua($request->endereco['rua']);
        $endereco->numero($request->endereco['numero']);
        $endereco->complemento($request->endereco['complemento']);
        $endereco->bairro($request->endereco['bairro']);
        $endereco->cidade($request->endereco['cidade']);
        $endereco->estado($request->endereco['estado']);
        $endereco = $endereco->cadastrar();

        $lojas = new LojasClientes();
        $lojas->cadastrar(id_usuario_atual(), $request->nome, $request->celular, $endereco);

        return redirect()->route('clientes.lojas.index');
    }

    public function delete(Request $request)
    {
        $lojasClientes = new LojasClientes();

        $lojasClientes->desativar($request->id);

        return redirect()->back();
    }
}
