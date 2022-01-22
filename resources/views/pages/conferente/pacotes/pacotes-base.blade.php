<x-layout>
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card shadow">
            <div class="card-header border">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0">Pacotes na Base</h3>
                        <small>Quantidade: {{ count($pacotes) }} pacotes</small>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('layouts.componentes.alerts')
                <div class="row mb-4">
                    <div class="col-12">
                        @foreach ($pacotes as $pacote)
                            <div class="card shadow-sm p-3 mb-4">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-12 col-md-12">
                                        <small class="mb-2">
                                            <div class="row justify-content-around">
                                                <div class="col-md-2">
                                                    <b>Código:</b> {{ $pacote->rastreio }}
                                                </div>
                                                <div class="col-md-7">
                                                    <b>Status:</b> {{ get_status_pacote($pacote->status) }}
                                                </div>
                                                <div class="col-md-3">
                                                    <b>Data:</b>
                                                    {{ date('d/m/Y H:i', strtotime($pacote->created_at)) }}
                                                </div>
                                            </div>
                                        </small>

                                        <hr class="my-2">
                                        <small class="d-block mb-2 justify-content-between">
                                            <b>Entregador Responsável: </b>
                                            {{ get_dados_usuario($pacote->entregador)->nome }}
                                        </small>

                                        <hr class="my-2">
                                        <small class="d-block mb-2 justify-content-between">
                                            <div class="row justify-content-between">
                                                <div class="col-md-6 border-right border-bottom mb-2">
                                                    <h4 class="text-muted">Remetente</h4>
                                                    <div class="mb-2 d-block">
                                                        <b>Nome:</b>
                                                        {{ get_dados_usuario($pacote->user_id)->nome }}
                                                    </div>
                                                    <div class="mb-2 d-block">
                                                        <b>Endereço de Entrega:</b>
                                                        {{ get_endereco_loja($pacote->loja) }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 border-bottom mb-2">
                                                    <h4 class="text-muted">Destinatário</h4>
                                                    <div class="mb-2 d-block">
                                                        <b>Nome:</b>
                                                        {{ get_destinatario_pacote($pacote->destinatario)->nome }}
                                                    </div>
                                                    <div class="mb-2 d-block">
                                                        <b>Cep:</b>
                                                        {{ formatar_cep($pacote->regiao) }}
                                                    </div>
                                                    <div class="mb-2 d-block">
                                                        <b>Endereço de Entrega:</b>
                                                        {{ get_endereco_destinatario($pacote->destinatario) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </small>
                                    </div>
                                </div>
                                <div class="row justify-content-end mb-2">
                                    <div class="col-auto text-right">
                                        <a class="btn btn-link btn-sm text-primary"
                                            href="{{ route('conferente.pacotes.info', ['id' => $pacote->id]) }}">
                                            Detalhes</a>
                                    </div>
                                    <div class="col-auto text-right">
                                        <button class="btn btn-link btn-sm btn-alterar-entregador">
                                            Alterar Entregador
                                        </button>
                                    </div>
                                </div>
                                <div class="row justify-content-end pt-3 border-top alterar-entregador"
                                    style="display: none">
                                    <div class="col-auto text-right">
                                        <form method="POST" action="{{ route('conferente.pacotes.alterar-entregador') }}"
                                            class="form-inline"> @csrf @method('put')

                                            <select class="form-control mr-2" name="id_entregador" required>
                                                <option value="">Escolha o Entregador</option>
                                                @foreach ($entregadores as $entregador)
                                                    <option value="{{ $entregador->id }}">
                                                        {{ $entregador->nome }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <input type="hidden" name="id" value="{{ $pacote->id }}">
                                            <button type="submit" class="btn btn-success">Salvar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if (!count($pacotes))
                            <div class="row">
                                <div class="col-auto mx-auto text-muted pt-4 text-center">
                                    <small class="text-muted d-block">
                                        No momento não há pacotes sendo entregues aos destinatários.
                                    </small>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script>
        $(function() {
            $('.btn-alterar-entregador').click(function() {
                $(this).parent().parent().parent().find('.alterar-entregador').toggle(500);
            })
        })
    </script>
    </x-layout>
