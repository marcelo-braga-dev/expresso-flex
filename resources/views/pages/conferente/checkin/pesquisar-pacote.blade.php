<x-layout>

    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="row justify-content-center">

            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Histórico Recente</h6>
                                <h2 class="mb-0">Pacotes na Base para Entrega</h2>
                                @if (count($pacotes))
                                    <small>
                                        Quantidade: {{ count($pacotes) }} pacotes.
                                    </small>
                                @else
                                    <small class="text-muted">Não há pacotes cadastrados.</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        @foreach ($pacotes as $pacote)
                            <div class="border-bottom p-3">
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <small class="d-block"><b>Código de Rastreio: </b>{{ $pacote->rastreio }}
                                        </small>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <small><b>Origem: </b>{{ get_origem_pacote($pacote->origem) }}
                                            @if ($pacote->codigo)
                                                - cod. {{ $pacote->codigo }}
                                            @endif
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <a href="{{ route('conferente.pacotes.qrcode.checkin.start') }}"
           class="btn-flutuante btn-danger btn-camera" target="_blank" style="display: none">
            <i style="margin-top:12px" class="fas fa-camera"></i>
        </a>
        @push('js')
            <script>
                if (Android.isAndroid()) {
                    $('.btn-camera').show();
                }
            </script>
        @endpush
    </div>
</x-layout>
