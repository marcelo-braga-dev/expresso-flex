<x-layout menu="coletas" submenu="solicitacoes">
    <div class="header bg-principal bg-height-top"></div>
    <div class="container-fluid mt--9 px-1 mb-6">
        <x-entregadores.botoes-header-entregador categoria="coletas"></x-entregadores.botoes-header-entregador>
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col-6">
                        <small class="badge badge-info"><i class="fas fa-dolly"></i> Coleta de Pacotes</small>
                        <h4 class="card-title text-uppercase mb-0">
                            Solicitações de Coleta
                        </h4>
                    </div>
                    <div class="col-6">
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <a class="btn btn-sm btn-primary my-2"
                                   href="{{ route('entregadores.coletas.create') }}">
                                    Abrir Nova Coleta
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-auto">
                        <div class="form-group m-0 pt-2">
                            <div class="input-group input-group-alternative input-group-merge bg-white">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-search"></i>
                                </span>
                                </div>
                                <input type="text" class="form-control" id="search-list" placeholder="Pesquisar...">
                            </div>
                        </div>
                    </div>
                    <div class="col-auto d-none d-md-block">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-dolly"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body p-1">
                <div class="px-lg-4">
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            @foreach ($solicitacoes as $solicitacao)
                                <div class="card my-3 shadow-sm border-primary">
                                    <div class="row p-3">
                                        <div class="col-md-9">
                                            <p class="mb-0">
                                                <i class="fas fa-user mr-2 text-primary"></i>
                                                <b>{{ get_nome_usuario($solicitacao['user_id']) }}
                                                    ({{ get_loja($solicitacao['loja'])->nome }})</b>
                                            </p>

                                            <p class="mb-0">
                                                <i class="fas fa-map-marker-alt mr-2 text-danger"></i>
                                                {{ get_endereco_loja($solicitacao['loja']) }}
                                            </p>
                                            <div class="row">
                                                <div class="col-6 col-md-3">
                                                    <small class="text-muted">
                                                        <i class="fas fa-calendar-alt mr-2 text-primary"></i>
                                                        {{ date('d/m/y H:i', strtotime($solicitacao->updated_at)) }}
                                                    </small>
                                                </div>
                                                <div class="col-6 col-md-3">
                                                    <small class="text-muted">
                                                        <i class="fas fa-hashtag mr-2 text-primary"></i>
                                                        ID: #{{ $solicitacao['id'] }}
                                                    </small>
                                                </div>
                                            </div>

                                            <form method="POST"
                                                  action="{{ route('entregadores.coletas.cancelar-coleta') }}">
                                                @csrf @method('PUT')
                                                <hr class="d-none cancelar-coleta">
                                                <label class="d-none cancelar-coleta mt-2">
                                                    Motivo do cancelamento
                                                </label>
                                                <textarea class="form-control mb-2 d-none cancelar-coleta"
                                                          name="motivo_cancelamento"
                                                          placeholder="Motivo do cancelamento da coleta" rows="5"
                                                          minlength="5"
                                                          required></textarea>
                                                <div class="text-center mb-3">
                                                    <button type="button"
                                                            class="btn btn-secondary d-none cancelar-coleta btn-cancelar">
                                                        Canelar
                                                    </button>
                                                    <button type="submit" name="id_coleta"
                                                            value="{{ $solicitacao['id'] }}"
                                                            class="btn btn-success d-none cancelar-coleta">
                                                        Enviar
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-3">
                                            @if ($solicitacao['status'])
                                                <div>
                                                    <a class="btn btn-success btn-block mb-3 cancelar-coleta"
                                                       href="{{ route('entregadores.coletas.pacotes.show', $solicitacao['id']) }}">
                                                        Cadastrar Pacotes
                                                    </a>
                                                    <div class="row justify-content-between">
                                                        <div class="col-auto">
                                                            <button type="button"
                                                                    class="btn btn-link text-danger btn-block btn-sm btn-cancelar cancelar-coleta">
                                                                Cancelar Coleta
                                                            </button>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button type="button" value="{{ $solicitacao['id'] }}"
                                                                    class="btn btn-primary btn-block btn-sm btn-finalizar-coleta"
                                                                    data-toggle="modal"
                                                                    data-target="#modalFinalizarColeta">
                                                                Finalizar Coleta
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            @else
                                                <div>
                                                    <button type="button"
                                                            class="btn btn-danger btn-block btn-sm btn-cancelar">
                                                        Excluir
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @if ($solicitacoes->isEmpty())
                                <div class="row pt-3">
                                    <div class="col-auto mx-auto">
                                        <small class="text-muted">Não há coletas</small>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                      action="{{ route('entregadores.coletas.update', 1) }}">
                    <div class="modal-body">
                        @csrf @method('put')
                        Confimar finalização da coleta no cliente?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success" name="id_coleta" id="btn-modal-finalizar-coleta"
                                value="">
                            Finalizar Coleta
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            $(function () {
                $('.btn-finalizar-coleta').click(function () {
                    $('#btn-modal-finalizar-coleta').val($(this).val());
                    console.log($(this).val());
                });
                $('.btn-cancelar').click(function () {
                    $(this).parent().parent().parent().parent().parent().find('.cancelar-coleta').toggleClass('d-none');
                });
            });
        </script>
    @endpush
</x-layout>
