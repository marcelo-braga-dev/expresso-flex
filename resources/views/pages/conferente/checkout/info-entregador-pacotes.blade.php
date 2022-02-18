<x-layout>

    <div class="header bg-principal bg-height-top"></div>

    <!-- Page content -->
    <div class="container-fluid mt--9">
        <div class="row">
            <div class="col">
                <div class="card bg-secondary">
                    <!-- Card header -->
                    <div class="card-header bg-secundario border-0">
                        <h3 class="mb-0 text-white">
                            Pacotes para Entregar
                        </h3>
                    </div>
                    <div class="row p-3">
                        <div class="col-12">

                            @include('layouts.componentes.alerts')

                            @foreach ($pacotes as $pacote)
                                <div class="card p-3 mb-3">
                                    <div class="row justify-content-between">
                                        <div class="col-12 col-md-auto">
                                            <small class="d-block mb-2">
                                                <b>Código de Rastreio:</b> {{ $pacote->rastreio }}
                                                @if ($pacote->codigo) <b class="ml-4">Código do Pacote:</b>
                                                #{{ $pacote->codigo }} @endif
                                            </small>
                                            <small class="d-block mb-2">
                                                <b>Entregador:</b>
                                                {{ get_dados_usuario($pacote->entregador)->nome }}
                                            </small>
                                            <small class="d-block mb-2">
                                                <b>CEP:</b> {{ formatar_cep($pacote->regiao) }}
                                            </small>
                                            <small class="d-block mb-2">
                                                <b>Endereço de Entrega:</b>
                                                {{ get_endereco($pacote->endereco) }}
                                            </small>
                                            <div class="alterar-entregador" style="display: none">
                                                <hr>
                                                <form method="POST"
                                                      action="{{ route('conferente.pacotes.alterar-entregador') }}">
                                                    @csrf @method('put')
                                                    <div class="row mb-3">
                                                        <div class="col-md-auto mb-2">
                                                            <label>Escolha o entregador para transferir a
                                                                entrega</label>
                                                            <select class="form-control" name="id_novo_entregador"
                                                                    required>
                                                                <option value="">Escolha o Entregador</option>
                                                                @foreach ($entregadores as $entregador)
                                                                    <option value="{{ $entregador->id }}">
                                                                        {{ $entregador->nome }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-auto align-self-end mb-3">
                                                            <input type="hidden" name="id_pacote"
                                                                   value="{{ $pacote->id }}">
                                                            <button class="btn btn-success">Enviar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-auto">
                                            <div>
                                                <button class="btn btn-primary btn-alterar-entregador">Alterar
                                                    Entregador
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            {{-- @if (!count($contas))
                                <div class="row">
                                    <div class="col-auto mx-auto p-3">
                                        <small class="text-muted">
                                            Não há contas vinculadas.
                                        </small>
                                    </div>
                                </div>
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            $(function () {
                $('.btn-alterar-entregador').click(function () {
                    $(this).parent().parent().parent().find('.alterar-entregador').toggle(700);
                });
            })
        </script>
    @endpush
</x-layout>
