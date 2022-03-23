<x-layout>

    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow mb-3">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col-9">
                        <small class="badge badge-info"><i class="fas fa-dolly mr-1"></i>Cadastro de Pacotes da
                            Coleta</small>
                        <h3 class="mb-0 text-principal">Cadastrar Pacotes da Coleta</h3>
                    </div>
                    <div class="col-3 text-right">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-boxes"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-12">
                        <span class="d-block">
                            <b>Cliente:</b>
                            {{ get_nome_usuario($solicitacao['user_id']) }}
                            [{{ get_loja($solicitacao['loja'])->nome }}]
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{ route('entregadores.coleta.alterar-status') }}">
                            @csrf @method('put')
                            <button type="submit" class="btn btn-primary" name="id_coleta"
                                    value="{{ $solicitacao['id'] }}">
                                Finalizar Coleta
                            </button>
                        </form>
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
                        @if (count($pacotesCadastrados))
                            <small>
                                Quantidade: {{ count($pacotesCadastrados) }} pacotes.
                            </small>
                        @else
                            <small class="text-muted">Não há pacotes cadastrados.</small>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @foreach ($pacotesCadastrados as $pacote)
                        @include('layouts.componentes.list-pacotes', ['link' => 'entregadores.pacote.show'])
                    @endforeach

                    @if ($pacotesCadastrados->isEmpty())
                        <div class="col-auto text-center p-3">
                            <small>Não há histórico de pacotes.</small>
                        </div>
                    @endif
                </ul>
            </div>
        </div>

        <!-- Botao Flutuante -->
        <a href="{{ route('entregadores.pacotes.qrcode.cadastro.meli.start', [$idColeta, $solicitacao['user_id']]) }}"
           class="btn-flutuante btn-danger btn-camera" target="_blank" style="display: none">
            <i style="margin-top:12px" class="fas fa-camera"></i>
        </a>

        <!-- Modal -->
        @if (!empty($_GET['codigoRastreio']))
            <div class="modal fade" id="modalCodigoRastreio" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom">
                            <h5 class="modal-title" id="exampleModalLabel">Pacote Cadastrado</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span class="d-block mb-3">
                                Código de rastreio do pacote:
                            </span>
                            <h2>
                                {{ $_GET['codigoRastreio'] }}
                            </h2>
                            <small>Anote esse código em algum lugar visível do pacote.</small>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            @push('js')
                <script>
                    $(function () {
                        $('#modalCodigoRastreio').modal('show');
                    })
                </script>
            @endpush
        @endif
        @push('js')
            <script>
                if (Android.isAndroid()) {
                    $('.btn-camera').show();
                }
            </script>

            <script src="/assets/js/components/busca-cep.js"></script>
        @endpush

    </div>
</x-layout>
