<x-layout menu="coletas" submenu="solicitacoes">

    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 mb-5">
        <x-entregadores.botoes-header-entregador categoria="coletas"></x-entregadores.botoes-header-entregador>
        <div class="card bg-secondary shadow mb-3">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col-9">
                        <small class="badge badge-info">
                            <i class="fas fa-dolly mr-1"></i>
                            Cadastro de Pacotes da Coleta
                        </small>
                        <h3 class="mb-0 text-principal">Cadastrar Pacotes da Coleta</h3>
                    </div>
                    <div class="col-3 text-right">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-boxes"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-secondary shadow mb-3">
            <div class="card-header bg-white mb-0">
                <div class="row mb-2">
                    <div class="col-md-auto">
                        <span class="d-block">
                            <b>Cliente:</b>
                            {{ get_nome_usuario($solicitacao['user_id']) }}
                            [{{ get_loja($solicitacao['loja'])->nome }}]
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-auto">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                data-target="#modalFinalizarColeta">
                            Finalizar Coleta
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">
                            Pacotes Cadastrados
                        </h4>
                        @if (count($pacotes))
                            <small>
                                Quantidade: {{ count($pacotes) }} pacotes.
                            </small>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @foreach ($pacotes as $pacote)
                        @include('layouts.componentes.list-pacotes', ['link' => 'entregadores.pacote.show'])
                    @endforeach

                    @if ($pacotes->isEmpty())
                        <div class="col-auto text-center p-3">
                            <small>Não há histórico de pacotes.</small>
                        </div>
                    @endif
                </ul>
            </div>
        </div>

        <!-- Botao Flutuante -->
        <a href="{{  route('entregadores.qrcode', [
                                    urlencode(route('entregadores.qrcode.cadastrarPacote').
                                        '?coleta=' . $solicitacao['id'] . '&entregador=' . id_usuario_atual() ),
                                    urlencode(url()->current())]) }}"
           class="btn-flutuante btn-danger btn-camera" target="_blank" style="display: none">
            <i style="margin-top:12px" class="fas fa-camera"></i>
        </a>

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
        @push('js')
            <script>
                if (Android.isAndroid()) {
                    $('.btn-camera').show();
                }
            </script>
        @endpush
    </div>
</x-layout>
