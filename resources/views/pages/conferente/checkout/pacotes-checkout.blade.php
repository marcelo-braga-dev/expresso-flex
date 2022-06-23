<x-layout>
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white">
                <div class="row align-items-center px-lg-4">
                    <h3 class="mb-0">Histórico de Coletas</h3>
                </div>
            </div>
            <div class="card-body">

                <div class="px-lg-4">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h3><b>HISTÓRICO DE SOLICITAÇÕES DE COLETAS</b></h3>
                            @foreach ($pacotes as $pacote)
                                <ul class="list-group mb-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="p-1">
                                            <small class="d-block mb-2">
                                                <b>Código Rastreio: </b>{{ $pacote->rastreio }}
                                            </small>
                                            <small class="d-block">
                                                <b>Origem: </b>{{ get_origem_pacote($pacote->origem) }}
                                                #{{ $pacote->codigo }}
                                            </small>
                                        </div>
                                    </li>
                                </ul>
                            @endforeach
                            @if (!count($pacotes))
                                <div class="row">
                                    <div class="col-auto mx-auto text-muted pt-4">
                                        Não há pacotes em aberto na base.
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </x-layout>
