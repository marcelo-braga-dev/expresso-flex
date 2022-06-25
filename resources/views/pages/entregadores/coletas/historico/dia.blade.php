<x-layout menu="coletas" submenu="historico-coletas">
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-2">Histórico de Coletas</h4>
                        {{ date('d/m/Y', strtotime($dia)) }}
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">

                <ul class="list-group list-group-flush">
                    @foreach ($solicitacoes as $solicitacao)
                        <li
                            class="list-group-item row-clickable d-flex justify-content-between align-items-center px-4">
                            <div>
                                <p class="mb-0">
                                    <b>{{ get_dados_usuario($solicitacao->user_id)->name }}</b>
                                </p>
                                <p class="text-mb mb-0">
                                    {{ get_endereco_loja($solicitacao->loja) }}
                                </p>
                                <small class="d-block text-success">
                                    <i class="fas fa-dolly mr-1 mt-2"></i>
                                    {{ get_status_coleta($solicitacao->status) }}
                                </small>
                            </div>
                            <a class="btn btn-link p-0 btn-sm"
                               href="{{ route('entregadores.coletas.info', ['id' => $solicitacao->id]) }}">
                                Ver detalhes
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


        <!-- Botão para acionar modal -->
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">
        Abrir modal de demonstração
    </button> --}}

    <!-- Modal -->
        <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary">Salvar mudanças</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</x-layout>
