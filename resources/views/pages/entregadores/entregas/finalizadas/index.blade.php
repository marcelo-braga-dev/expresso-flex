<x-layout menu="historico" submenu="entregas-finalizadas">
    <div class="header bg-principal bg-height-top"></div>
    <div class="container-fluid mt--9">
        <div class="card card-stats mb-5 border shadow-sm">
            <div class="card-header">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <h4 class="card-title text-uppercase mb-0">Entregas Finalizadas</h4>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ route('entregadores.entregas.index') }}">
                            Voltar
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
{{--                <x-elements.pacotes.items :pacotes="$pacotes" link="entregadores.pacote.show"></x-elements.pacotes.items>--}}

                <ul class="list-group list-group-flush">
                    @foreach ($pacotes as $pacote)
                        <li class="list-group-item row-clickable">
                            <div class="row d-flex justify-content-between align-items-center">
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
                                    @empty($simples)
                                        <p class="mb-0">
                                            <i class="fas fa-map-marker-alt mr-2 text-danger"></i>
                                            {{ get_endereco($pacote->endereco) }}
                                        </p>
                                    @endempty
                                    <p class="text-sm mb-0">
                                        <i class="fas fa-qrcode mr-2"></i>
                                        {{ get_origem_pacote($pacote->origem) }}
                                        @if (!empty($pacote->codigo))
                                            - <b>#{{ $pacote->codigo }}</b>
                                        @else
                                            - <b>{{ $pacote->rastreio }}</b>
                                        @endif
                                    </p>
                                    @empty($simples)
                                        <small class="d-block text-success mt-2">
                                            <i class="fas fa-box mr-2"></i>
                                            {{ get_status_pacote($pacote->status) }}
                                        </small>
                                    @endempty
                                </div>
                                <div class="col-12 col-md-2 text-right">
                                    <a class="small pl-5" href="{{ route('entregadores.pacote.show', $pacote->id) }}">
                                        Detalhes
                                    </a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="row p-3">
                    <div class="col-auto mx-auto">
                        {{ $pacotes }}
                    </div>
                </div>


            @if ($pacotes->isEmpty())
                    <div class="row">
                        <div class="col-auto mx-auto">
                            <small class="text-muted">Não há histórico de pacotes coletados</small>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>
