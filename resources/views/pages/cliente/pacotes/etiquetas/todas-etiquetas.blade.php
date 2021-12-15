@extends('layouts.admin', ['title' => 'Etiquetas'])

@section('content')
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-1">Etiquetas para Imprimir</h4>
                        <a class="btn btn-primary" href="{{ route('cliente.etiqueta.emitir-etiqueta') }}">
                            Emitir Etiqueta
                        </a>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="far fa-file-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-1">
                @foreach ($pacotes as $pacote)
                    <div class="card shadow-sm p-3 mb-2">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-lg-10">
                                <p class="mb-0">
                                    <i class="fas fa-user mr-2 text-primary"></i>
                                    <b>{{ get_destinatario_pacote($pacote->destinatario)->nome }}</b>
                                </p>

                                <div class="row">
                                    <div class="col-md-auto">
                                        <p class="text-sm mb-0">
                                            <i class="fas fa-qrcode mr-2"></i>
                                            {{ $pacote->rastreio }}
                                        </p>
                                    </div>
                                    <div class="col-md-auto">
                                        <p class="text-sm mb-0">
                                            <i class="far fa-calendar-alt"></i>
                                            {{ date('d/m/Y H:i', strtotime($pacote->created_at)) }}
                                        </p>
                                    </div>
                                </div>


                                <p class="mb-0">
                                    <i class="fas fa-map-marker-alt mr-2 text-danger"></i>
                                    {{ get_endereco_destinatario($pacote->destinatario) }}
                                </p>
                            </div>
                            <div class="d-none d-md-block text-center col-md-2">
                                <form method="POST" action="{{ route('cliente.etiqueta.imprimir-etiqueta') }}"
                                    target="_blank">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $pacote->id }}">
                                    <button class="btn mr-4 btn-link">
                                        <i class="fas fa-file-pdf text-danger d-block" style="font-size: 28px"></i>
                                        <small class="d-block text-muted">
                                            Imprimir
                                        </small>
                                    </button>
                                </form>
                            </div>
                            <div class="d-md-none text-center col-md-2">
                                <small>Só é póssível imprimir etiquetas pelo computador.</small>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if (!count($pacotes))
                    <div class="row">
                        <div class="col-auto mx-auto text-muted pt-4 text-center">
                            <small class="text-muted d-block">
                                Não há etiquetas emitidas para imprimir.
                            </small>
                            <a class="btn btn-primary my-2" href="{{ route('cliente.etiqueta.emitir-etiqueta') }}">
                                Emitir Etiqueta
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
