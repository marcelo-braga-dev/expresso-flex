@extends('layouts.admin', ['title' => 'Cadastro de Clientes'])

@section('content')
    <div class="header bg-principal bg-height-top"></div>

    <!-- Page content -->
    <div class="container-fluid mt--9">
        <div class="card mb-4">
            <!-- Card header -->
            <div class="card-header border">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Irformações da Coleta</h3>
                    <a class="btn btn-primary btn-sm text-white" href="{{ url()->previous() }}">
                        Voltar
                    </a>
                </div>
            </div>

            <div class="card-body">
                <!-- Cliente -->
                <div class="card p-3 mb-4">
                    <h3>Cliente</h3>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p class="text-sm mb-0">
                                <b>Cliente:</b>
                                {{ get_dados_usuario($coleta->user_id)->nome }}
                            </p>
                        </div>
                        <div class="col-md-3">
                            <p class="text-sm mb-0">
                                <b>Telefone:</b>
                                @if (!empty($coleta->loja))
                                    {{ get_loja($coleta->loja, $coleta->user_id)->celular }}
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="text-sm mb-0">
                                <b>Endereço:</b>
                                {{ get_endereco_loja($coleta->loja) }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Coleta -->
                <div class="card p-3 mb-4">
                    <h3>Detalhes</h3>
                    <div class="row ">
                        <div class="col-md-6">
                            <p class="d-block">
                                Status: {{ get_status_coleta($coleta->status) }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form method="post" action="{{ route('entregadores.coleta.alterar-status') }}">
                                @csrf @method('put')
                                <input type="hidden" name="reabrir" value="true">
                                <button type="submit" class="btn btn-success btn-sm" name="id_coleta"
                                    value="{{ $coleta->id }}">
                                    Reabrir Coleta
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card p-3 mb-4">
                    <div class="row justify-content-between px-3">
                        <h3 class="mb-3">Pacotes Coletados</h3>
                        <small>Quantidade: {{ count($pacotes) }} pacotes.</small>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Código de Rastreio</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Data</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pacotes as $pacote)
                                            <tr>
                                                <th scope="row">
                                                    {{ $pacote->rastreio }}
                                                </th>
                                                <td>
                                                    {{ get_status_pacote($pacote->status) }}
                                                </td>
                                                <td>
                                                    {{ date('d/m/y H:i', strtotime($pacote->updated_at)) }}
                                                </td>
                                                <td>
                                                    <a class="btn btn-link p-0 btn-sm"
                                                        href="{{ route('entregadores.pacotes.info', ['id' => $pacote->id]) }}">
                                                        Ver Pacote
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
    </div>
@endsection
