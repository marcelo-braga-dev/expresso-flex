<?php

namespace App\Http\Controllers\Admins\Integracoes\Clientes;

use App\Models\IntegracaoMercadoLivre;
use App\Models\UsersNotifications;
use App\src\Integracoes\MercadoLivre\AutenticarAutorizar\Autorizar;
use App\src\Integracoes\MercadoLivre\Requisicoes\DadosRequisicao;
use Illuminate\Http\Request;

class MercadoLivreController
{
    public function index()
    {
        $contas = [];
        $integracaoMercadoLivre = new IntegracaoMercadoLivre();

        $todasContas = $integracaoMercadoLivre->query()
            ->orderBy('user_id', 'DESC')
            ->get();

        function diasDatas($data_inicial, $data_final)
        {
            $diferenca = strtotime($data_final) - strtotime('now');
            return floor($diferenca / (60 * 60 * 24));
        }

        foreach ($todasContas as $conta) {
            $contas[$conta->user_id]['user_id'] = $conta->user_id;

            $contas[$conta->user_id]['contas'][] =
                [
                    'id' => $conta->id,
                    'seller_id' => $conta->seller_id,
                    'status' => $conta->status,
                    'nickname' => $conta->nickname,
                    'created_at' => date('d/m/y', strtotime($conta->created_at)),
                    'updated_at' => date('d/m/y', strtotime($conta->updated_at . " +6 months")),
                    'dias' => diasDatas($conta->created_at, $conta->updated_at . " +6 months")
                ];
        }

        return view('pages.admins.integracoes.mercadolivre.clientes.index', compact('contas'));
    }

    public function update($id, Request $request)
    {
        $cliente = (new IntegracaoMercadoLivre())->newQuery()
            ->where('seller_id', '=', $request->seller_id)
            ->firstOrFail(['seller_id', 'refresh_token']);

        $this->atualizar($cliente);

        return redirect()->back();
    }

    public function destroy($id, Request $request)
    {
        (new UsersNotifications())->newQuery()
            ->create([
                'user_id' => $request->user_id,
                'type' => 'removido_conta_mercadolivre',
                'value' => "A sincronia da sua conta Mercado Livre ($request->nome) foi inativada,
                por favor, autorize novamente a sincronia.",
            ]);

        (new IntegracaoMercadoLivre())->newQuery()
            ->findOrFail($id)
            ->delete();

        modalSucesso('Conta deletada com sucesso.');
        return redirect()->back();
    }

    public function atualizarTodos()
    {
        $clientes = (new IntegracaoMercadoLivre())->newQuery()
            ->where('status', '=', 1)
            ->get(['seller_id', 'refresh_token']);

        foreach ($clientes as $cliente) {
            $this->atualizar($cliente);
        }
        modalSucesso('Atualiza????o Realizada com sucesso!');
        return redirect()->back();
    }

    private function atualizar($cliente): void
    {
        $dados = new DadosRequisicao();
        $dados->refreshToken = $cliente->refresh_token;
        $dados->sellerId = $cliente->seller_id;

        try {
            $autorizar = new Autorizar();
            $autorizar->renovarAutorizacao($dados);
            modalSucesso('Conta renovada com sucesso!');
        } catch (\DomainException $e) {
            modalErro('N??o foi poss??vel atualizar a integrac??o. ' . $e->getMessage());
        }
    }
}
