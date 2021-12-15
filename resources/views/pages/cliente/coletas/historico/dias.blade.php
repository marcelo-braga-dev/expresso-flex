@extends('layouts.admin', ['title' => 'Histórico de Coletas', 'menu_suspenso' => 'coletas'])

@section('content')
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-1">Histórico de Coletas do Mês</h4>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @foreach ($solicitacoes as $solicitacao)
                        <li class="list-group-item d-flex justify-content-between align-items-center px-4">
                            <div>
                                <p class="mb-0 d-block">
                                    <b>Data: {{ date('d/m/Y', strtotime($solicitacao->updated_at)) }}</b>
                                </p>
                                {{-- <small class="text-mb mb-0">
                                    {{ get_endereco_loja($solicitacao->loja) }}
                                </small> --}}
                                <small class="d-block">
                                    Status: {{ get_status_coleta($solicitacao->status) }}
                                </small>
                            </div>
                            <div>
                                <a class="small"
                                    href="
                                        {{ route('cliente.coleta.historico.pacotes-coletados', [
                                            'dia' => date('d', strtotime($solicitacao->updated_at)),
                                            'mes' => date('m', strtotime($solicitacao->updated_at)),
                                            'ano' => date('Y', strtotime($solicitacao->updated_at)),
                                        ]) }} ">
                                    Ver pacotes coleados
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
