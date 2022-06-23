<x-layout menu="etiquetas" submenu="para-imprimir">
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-1">Etiquetas para Imprimir</h4>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-link" href="{{ route('clientes.etiquetas.expressoflex.create') }}">
                            Emitir Etiqueta
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body p-1">
                <form method="GET" action="{{ route('clientes.etiquetas.expressoflex.show', 1) }}">
                    <div class="row p-2">
                        <div class="col-auto is-android">
                            <button type="submit" class="btn btn-primary m-2">Imprimir Selecionados</button>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-link m-2" name="impresso" value="true">
                                Marcar como impresso
                            </button>
                        </div>
                    </div>

                    @foreach ($etiquetas as $etiqueta)
                        <div class="card shadow-sm p-3 mb-2">
                            <div class="row justify-content-between">
                                <div class="col-2 col-md-1 text-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="etiquetas[]"
                                               value="{{ $etiqueta->id }}" id="customCheck{{ $etiqueta->id }}">
                                        <label class="custom-control-label"
                                               for="customCheck{{ $etiqueta->id }}"></label>
                                    </div>
                                </div>
                                <div class="col-10 col-md-11">
                                    <p class="mb-0">
                                        <i class="fas fa-user mr-2 text-primary"></i>
                                        <b>{{ get_destinatario_pacote($etiqueta->destinatarios_id)->nome }}</b>
                                    </p>

                                    <p class="mb-0">
                                        <i class="fas fa-map-marker-alt mr-2 text-danger"></i>
                                        {{ get_endereco($etiqueta->enderecos_id) }}
                                    </p>
                                    <div class="row">
                                        <div class="col-md-auto">
                                            <p class="text-sm mb-0">
                                                <i class="fas fa-qrcode mr-2"></i>
                                                {{ $etiqueta->rastreio }}
                                            </p>
                                        </div>
                                        <div class="col-md-auto">
                                            <p class="text-sm mb-0">
                                                <i class="far fa-calendar-alt"></i>
                                                {{ date('d/m/Y H:i', strtotime($etiqueta->created_at)) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-md-none text-center col-md-2">
                                    <small>Só é póssível imprimir etiquetas pelo computador.</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>

                @if ($etiquetas->isEmpty())
                    <div class="row">
                        <div class="col-auto mx-auto text-muted pt-4 text-center">
                            <small class="text-muted d-block">
                                Não há registro de etiquetas emitidas para imprimir.
                            </small>
                        </div>
                    </div>
                @endif
                <div class="row justify-content-center py-3">
                    <div class="col-auto">{{ $etiquetas }}</div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            $(function () {
                if (typeof Android == 'object') {
                    $('.is-android').hide();
                }
            })
        </script>
    @endpush
</x-layout>
