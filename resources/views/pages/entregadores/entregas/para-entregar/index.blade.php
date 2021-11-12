@extends('layouts.admin', ['title' => 'Entregas'])

@section('content')

    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto mb-2">
                        <h4 class="card-title text-uppercase mb-0">Pacotes para Entregar</h4>
                    </div>
                    <div class="col-auto text-right">
                        <div class="row text-right align-items-center">
                            <div class="col-auto">
                                <div class="form-group m-0 pt-2">
                                    <div class="input-group input-group-alternative input-group-merge bg-white">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="search-list"
                                            placeholder="Pesquisar...">
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto d-none d-md-block">
                                <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                                    <i class="fas fa-box"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-1 p-md-3">
                <div class="row">
                    <div class="col-12 pt-2">
                        @foreach ($pacotes as $pacote)
                            <div class="card shadow mb-3 info-search">
                                <div class="row justify-content-between align-items-center info-list p-3">
                                    <div class="col-md-12">
                                        <p class="mb-0">
                                            <i class="fas fa-map-marker-alt mr-2 text-danger"></i>
                                            {{ get_endereco_destinatario($pacote->destinatario) }}
                                            - Cep: {{ formatar_cep($pacote->regiao) }}
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

                                        <a class="btn btn-link p-1"
                                            href="{{ route('entregadores.entrega.para-entregar', ['id' => $pacote->id]) }}">
                                            Vou pra lá
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                @if ($pacotes->isEmpty())
                    <div class="row justify-content-center mb-3">
                        <div class="col-auto">
                            <small class="text-muted">
                                Não há pacotes cadastrados para entregar.
                            </small>
                        </div>
                    </div>
                @endif
                
            </div>
        </div>
    </div>

    <a href="{{ route('entregadores.pacotes.qrcode.saida-entrega.start') }}" class="btn-flutuante btn-danger btn-camera"
        target="_blank" style="display: none">
        <i style="margin-top:12px" class="fas fa-camera"></i>
    </a>
    <script>
        if (Android.isAndroid()) {
            $('.btn-camera').show();
        }
    </script>

@endsection
