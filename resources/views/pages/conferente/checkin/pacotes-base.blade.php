<x-layout menu="checkin" submenu="pacotes-base">
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col mb-2">
                        <h5 class="card-title text-uppercase text-muted mb-0">
                            Check-in de Pacotes
                        </h5>
                        <h4 class="card-title text-uppercase mb-0">
                            Pacotes Localizados na Base
                        </h4>
                    </div>
                    <div class="form-group m-0">
                        <div class="input-group input-group-alternative input-group-merge bg-white">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="search-list" placeholder="Pesquisar pacote...">
                        </div>
                    </div>
                    <div class="col-auto d-none d-md-block">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-boxes"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0"><?php $data = ''; ?>
                <ul class="list-group list-group-flush">
                    @foreach ($pacotes as $pacote)
                        @include('layouts.componentes.list-pacotes',
                        ['link' => 'conferentes.pacote.show', 'simples' => false, 'data' => true])
                    @endforeach

                    @if ($pacotes->isEmpty())
                        <div class="col-auto text-center p-3">
                            <small>Não há histórico de pacotes.</small>
                        </div>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    </x-layout>
