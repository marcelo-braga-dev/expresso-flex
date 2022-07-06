<x-layout menu="coletas" submenu="pacotes-sob-entrega">
    <div class="header bg-principal bg-height-top"></div>
    <!-- Page content -->
    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">Pacotes sendo Coletados</h4>
                    </div>
                    <div class="col-auto">
                    </div>
                </div>
            </div>
            <div class="card-body p-1">
                <ul class="list-group list-group-flush">
                    @foreach ($pacotes as $pacote)
                        @if (entregaNaoFinalizada($pacote->status))
                            <li class="list-group-item r ow-clickable">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-12 col-md-10">
                                        @if (!empty($pacote->updated_at))
                                            <small>
                                                {{ date('d/m/Y', strtotime($pacote->updated_at)) }}
                                                @if (date('d/m/Y', strtotime($pacote->updated_at)) == date('d/m/Y'))
                                                    - Hoje
                                                @endif
                                            </small>
                                        @endif

                                        <p class="mb-0">
                                            <i class="fas fa-user mr-2 text-primary"></i>
                                            <b>{{ get_destinatario_pacote($pacote->destinatario)->nome }}</b>
                                        </p>
                                        <p class="mb-0">
                                            <i class="fas fa-map-marker-alt mr-2 text-danger"></i>
                                            {{ get_endereco($pacote->endereco) }}
                                        </p>
                                        <p class="text-sm mb-0">
                                            <i class="fas fa-qrcode mr-2"></i>
                                            {{ get_origem_pacote($pacote->origem) }}
                                            @if (!empty($pacote->codigo))
                                                - <b>#{{ $pacote->codigo }}</b>
                                            @else
                                                - <b>{{ $pacote->rastreio }}</b>
                                            @endif
                                        </p>
                                        <p class="text-sm mb-0">
                                            <i class="fas fa-calendar-alt mr-2"></i>
                                            {{ date('d/m/y H:i', strtotime($pacote->created_at)) }}
                                        </p>
                                        <small class="d-block text-success mt-2">
                                            <i class="fas fa-box mr-2"></i>
                                            {{ get_status_pacote($pacote->status) }}
                                        </small>
                                        <form method="POST"
                                              action="{{ route('clientes.coletas.sob-entrega.update', $pacote->id) }}">
                                            @csrf @method('PUT')
                                            <textarea class="form-control my-2 cancelar-coleta d-none"
                                                      name="motivo_cancelamento"
                                                      placeholder="Motivo do cancelamento da entrega"
                                                      minlength="5"
                                                      required></textarea>
                                            <div class="text-center mb-3">
                                                <button type="button"
                                                        class="btn btn-secondary cancelar-coleta btn-cancelar-voltar d-none">
                                                    Voltar
                                                </button>
                                                <button type="submit" name="id_coleta"
                                                        value=""
                                                        class="btn btn-success cancelar-coleta d-none">
                                                    Enviar
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-12 col-md-2 pt-3">
                                        <a class="btn btn-primary btn-sm btn-block"
                                           href="{{ route('clientes.pacotes.show', $pacote->id) }}">
                                            Detalhes
                                        </a>
                                        @if (entregaNaoFinalizada($pacote->status))
                                            <button
                                                class="btn btn-link text-danger btn-sm btn-block btn-cancelar cancelar-coleta">
                                                Cancelar Entrega
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
                @if ($pacotes->isEmpty())
                    <div class="col-auto text-center p-3">
                        <small>Não há histórico de pacotes.</small>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @push('js')
        <script>
            $(function () {
                $('.btn-finalizar-coleta').click(function () {
                    $('#btn-modal-finalizar-coleta').val($(this).val());
                });
                $('.btn-cancelar').click(function () {
                    $(this).parent().parent().parent().find('.cancelar-coleta').toggleClass('d-none');
                });
                $('.btn-cancelar-voltar').click(function () {
                    $(this).parent().parent().parent().parent().find('.cancelar-coleta').toggleClass('d-none');
                });
            });
        </script>
    @endpush
</x-layout>
