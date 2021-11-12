@extends('layouts.admin', ['title' => 'Cadastrar Pacote'])

@section('content')
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">
                            Solicitar Coleta
                        </h5>
                        <h4 class="card-title text-uppercase mb-0">
                            SOLICITAÇÃO DE COLETA EM ANDAMENTO
                        </h4>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-dolly"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body pt-3">

                @include('layouts.componentes.alerts')

                <div class="card mb-4 px-lg-4">
                    <div class="row">
                        <div class="col-lg-12 p-0">
                            <ul class="list-group list-group-flush" style="font-size: 14px">
                                <li class="list-group-item py-2">
                                    <b>Ponto de Coleta: </b>
                                    {{ get_info_ponto_coleta($solicitacoes[0]['loja'])['nome'] }}
                                </li>
                                <li class="list-group-item py-2">
                                    <div class="row">
                                        <div class="col-12">
                                            <b>Status: </b>@if (!empty($solicitacoes[0]['status'])) {{ get_status_coleta($solicitacoes[0]['status']) }}@endif
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item py-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <b>Solicitado
                                                em:
                                            </b>{{ date('d/m/y H:i', strtotime($solicitacoes[0]['created_at'])) }}
                                        </div>
                                        <div class="col-md-6">
                                            <b>ID da Solicitação: </b>#{{ $solicitacoes[0]['id'] }}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <!-- Botão para acionar modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#ExemploModalCentralizado">
                        Cancelar Coleta
                    </button>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog"
        aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Cancelar Solicitação de Coleta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('cliente.coleta.cancelar-coleta') }}" autocomplete="off">
                    <div class="modal-body">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Motivo do Cancelamento</label>
                                <textarea class="form-control" name="motivo_cancelamento" minlength="10"
                                    required></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-danger">Cancelar Coleta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="/assets/js/components/busca-cep.js"></script>
@endsection
