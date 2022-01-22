<x-layout>
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-1">Histórico de Coletas</h4>
                        {{ date('d/m/Y', strtotime($dia)) }}
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="card-body bg-white py-0">
                @foreach ($solicitacoes as $solicitacao)
                    <div class="row justify-content-between border-bottom py-3 info-list">
                        <div class="col-md-auto">
                            <p class="mb-0">
                                <b>Cliente: {{ get_dados_usuario($solicitacao->user_id)->nome }}</b>
                            </p>
                            <p class="text-mb mb-0">
                                {{ get_endereco_loja($solicitacao->loja) }}
                            </p>
                            <small class="d-block">
                                Entregador:
                                @if (!empty($solicitacao->entregador))
                                    {{ get_dados_usuario($solicitacao->entregador)->nome }}
                                @endif
                            </small>
                            <small class="d-block text-warning">
                                {{ get_status_coleta($solicitacao->status) }}
                            </small>
                        </div>
                        <div class="col-md-auto">
                            <a class="small"
                               href="{{ route('admin.coletas.historico-pacotes-coletados-dia', ['id' => $solicitacao->id]) }}">
                                Ver Pacotes Coletados
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



</x-layout>
