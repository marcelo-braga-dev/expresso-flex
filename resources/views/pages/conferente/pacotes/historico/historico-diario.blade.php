<x-layout>
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-2">Histórico de Pacotes</h4>
                        {{ date('d/m/Y', strtotime($dia)) }}
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
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ route('conferente.pacotes.historico') }}">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @foreach ($pacotes as $pacote)
                        @include('layouts.componentes.list-pacotes', ['link' => 'conferente.pacotes.info'])
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
