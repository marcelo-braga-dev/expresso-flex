<x-layout menu="coletas" submenu="solicitacoes">
    <div class="header bg-principal bg-height-top"></div>
    <div class="container-fluid mt--9 px-1 mb-6">
{{--        <x-entregadores.botoes-header-entregador categoria="coletas"></x-entregadores.botoes-header-entregador>--}}
        <div class="card bg-secondary shadow mb-3">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col-12">
                        <small class="badge badge-info"><i class="fas fa-dolly"></i> Coleta de Pacotes</small>
                        <h3 class="mb-0 text-principal">Cadastrar Pacotes da Coleta</h3>
                    </div>
                </div>
                <hr class="m-2">
                <div class="row mb-2">
                    <div class="col-md-auto">
                        <span class="d-block">
                            <b>Cliente:</b><br>
                            {{ get_nome_usuario($solicitacao['user_id']) }}
                            [{{ get_loja($solicitacao['loja'])->nome }}]
                        </span>
                    </div>
                </div>
                <div class="row pt-3 justify-content-end">
                    <div class="col-6 text-center">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                data-target="#modalFinalizarColeta">
                            <i class="fas fa-check"></i>
                            Finalizar Coleta
                        </button>
                    </div>
                    <div class="col-6 text-warning btn-camera" style="display: none">
                        <button class="btn btn-warning btn-sm link-btn-flutuante-1">
                            <i class="fas fa-plus-circle"></i>
                            Cadastrar pacote
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-secondary shadow mb-6">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">
                            Pacotes Coletados
                        </h4>
                        @if (count($pacotes))
                            <small>
                                Quantidade: {{ count($pacotes) }} pacotes.
                            </small>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body bg-white p-0 text-sm">
                @foreach ($pacotes as $pacote)
                    <div class="row p-3 border-bottom">
                        <div class="col">
                            <div class="row">
                                <div class="col-1 text-right">
                                    <i class="fas fa-qrcode"></i>
                                </div>
                                <div class="col-11 pl-1">
                                    {{ get_origem_pacote($pacote->origem) }} -
                                    @if (!empty($pacote->codigo))
                                        <b>#{{ $pacote->codigo }}</b>
                                    @else
                                        <b>{{ $pacote->rastreio }}</b>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1 text-right">
                                    <i class="fas fa-map-marker-alt mr-2 text-danger"></i>
                                </div>
                                <div class="col-11 pl-1">
                                    {{ get_endereco($pacote->endereco) }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($pacotes->isEmpty())
                <div class="col-auto text-center p-3">
                    <small>Não há histórico de pacotes.</small>
                </div>
            @endif
        </div>
        <div class="p-2"></div>
    </div>

    <!-- Botao Flutuante -->
    <x-elements.camera-botao-flutuante operacao="{{ urlencode(route('entregadores.qrcode.cadastrarPacote').
                                        '?coleta=' . $solicitacao['id'] . '&entregador=' . id_usuario_atual() ) }}"
                                       retorno="{{ url()->current() }}"
                                       icon="fas fa-plus"></x-elements.camera-botao-flutuante>

    <!-- Modal Finalizar Coleta-->
    <div class="modal fade" id="modalFinalizarColeta" tabindex="-1" role="dialog"
         aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Finalizar coleta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post"
                      action="{{ route('entregadores.coletas.update', $solicitacao['id']) }}">
                    <div class="modal-body">
                        @csrf @method('put')
                        Confimar finalização de coleta no cliente?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success" name="id_coleta"
                                value="{{ $solicitacao['id'] }}">
                            Finalizar Coleta
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-layout>
