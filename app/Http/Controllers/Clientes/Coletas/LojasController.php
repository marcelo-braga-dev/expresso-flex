<?php

namespace App\Http\Controllers\Clientes\Coletas;

use App\Http\Controllers\Controller;
use App\Models\Enderecos;
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
        $this->setEndereco($endereco, $request);
        $endereco = $endereco->cadastrar();

        $lojas = new LojasClientes();
        $lojas->cadastrar(id_usuario_atual(), $request->nome, $request->celular, $endereco);

        modalSucesso('Cadastro realizado com sucesso!');
        return redirect()->route('clientes.lojas.index');
    }

    public function edit($id)
    {
        $loja = (new LojasClientes())->newQuery()->findOrFail($id);
        $endereco = (new Enderecos())->newQuery()->findOrFail($loja->endereco);

        return view('pages.clientes.coletas.lojas.edit', compact('loja', 'endereco'));
    }

    public function update($id, Request $request)
    {
        $loja = (new LojasClientes())->newQuery()->findOrFail($id);
        $loja->update([
            'nome' => $request->nome,
            'celular' => $request->celular,
        ]);

        $endereco = new CadastrarEndereco();
        $this->setEndereco($endereco, $request);
        $endereco->atualizar($loja->endereco);

        modalSucesso('Dados atualizados com sucesso!');
        return redirect()->route('clientes.lojas.index');
    }

    public function destroy($id)
    {
        (new LojasClientes())->desativar($id);

        return redirect()->back();
    }

    private function setEndereco($endereco, Request $request): void
    {
        $endereco->cep($request->endereco['cep']);
        $endereco->rua($request->endereco['rua']);
        $endereco->numero($request->endereco['numero']);
        $endereco->complemento($request->endereco['complemento']);
        $endereco->bairro($request->endereco['bairro']);
        $endereco->cidade($request->endereco['cidade']);
        $endereco->estado($request->endereco['estado']);
    }
}
