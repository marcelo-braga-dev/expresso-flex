<x-layout>
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card mb-4">
            <!-- Card header -->
            <div class="card-header border">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Irformações do Pacote</h3>
                    <a class="btn btn-primary btn-sm text-white" href="{{ url()->previous() }}">
                        Voltar
                    </a>
                </div>
            </div>

            <div class="card-body p-1">
                <div class="card p-3 mb-2">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <p class="text-sm mb-0">
                                <b>Código de Rastreio:</b> {{ $pacote->rastreio }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-sm mb-0">

                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="text-sm mb-0">
                                <b>Status:</b> {{ get_status_pacote($pacote->status) }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-sm mb-0">
                                <b>Origem:</b> {{ get_origem_pacote($pacote->origem) }}
                                @if ($pacote->codigo)
                                    #{{ $pacote->codigo }}
                                @endif
                            </p>
                        </div>
                    </div>
                    @if (!empty($pacote->texto))
                        <div class="row mt-3">
                            <div class="col-12">
                                <p class="text-sm mb-0">
                                    <b>Observações:</b><br>
                                    {{ $pacote->texto }}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Destinatario --}}
                <div class="card p-3 mb-2">
                    <h3>Destinatário</h3>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p class="text-sm mb-0">
                                <b>Nome:</b>
                                {{ get_destinatario_pacote($pacote->destinatario)->nome }}
                            </p>
                        </div>
                        <div class="col-md-3">
                            <p class="text-sm mb-0">
                                <b>Telefone:</b>
                                {{ get_destinatario_pacote($pacote->destinatario)->telefone }}
                            </p>
                        </div>
                        <div class="col-md-3">
                            <p class="text-sm mb-0">
                                <b>CPF/RG:</b>
                                {{ get_destinatario_pacote($pacote->destinatario)->cpf }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="text-sm mb-0">
                                <b>Endereço:</b> {{ get_endereco($pacote->endereco) }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Remetente --}}
                <div class="card p-3 mb-2">
                    <h3>Remetente</h3>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p class="text-sm mb-0">
                                <b>Nome:</b>
                                {{ get_dados_usuario($pacote->user_id)->name }}
                            </p>
                        </div>
{{--                        <div class="col-md-3">--}}
{{--                            <p class="text-sm mb-0">--}}
{{--                                <b>Telefone:</b>--}}
{{--                                @if (!empty($pacote->loja))--}}
{{--                                    {{ get_loja($pacote->loja, $pacote->user_id)->celular }}--}}
{{--                                @endif--}}
{{--                            </p>--}}
{{--                        </div>--}}
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="text-sm mb-0">
                                <b>Endereço:</b>
                                {{ get_endereco_loja($loja) }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card p-3 mb-2">
                    <h3>Informações da Entrega</h3>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <p class="text-sm mb-0">
                                <b>Quem recebeu?</b>
                                {{ $recebedor->recebedor ?? '' }}
                            </p>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <p class="text-sm mb-0">
                                <b>Nome:</b> {{ $recebedor->nome ?? '' }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-sm mb-0">
                                <b>CPF/RG:</b> {{ $recebedor->documento ?? '' }}
                            </p>
                        </div>
                    </div>
                    @if (!empty($recebedor->observacoes))
                        <div class="row mt-2">
                            <div class="col-12">
                                <p class="text-sm mb-0">
                                    <b>Observações:</b><br>
                                    {{ $recebedor->observacoes }}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="card p-3 mb-2">
                    <h3 class="mb-3">Histórico</h3>
                    <div class="row mb-2">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="col-1"></th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Mensagem</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($historicos as $historico)
                                        <tr>
                                            <td class="text-center">
                                                @if (empty($historico['obs']))
                                                    <i class="fas fa-check text-success"></i>
                                                @else
                                                    <i class="fas fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            <td>
                                                {{ date('d/m/y H:i', strtotime($historico['data'])) }}
                                            </td>
                                            <th scope="row">
                                                {{ get_status_pacote($historico['status']) }}
                                            </th>
                                            <td>
                                                -
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
</x-layout>
