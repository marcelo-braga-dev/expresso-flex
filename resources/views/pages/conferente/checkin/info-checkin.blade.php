<x-layout>
    <div class="header bg-principal bg-height-top">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white">
                <div class="row align-items-center px-lg-4">
                    <h3 class="mb-0">Check-in de Pacotes</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="px-lg-4">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h3><b>Informações do Pacote</b></h3>
                            <div class="card">
                                <div class="row justify-content-between align-items-center p-3 ">
                                    <div class="col-lg-auto mb-3">
                                        <small class="d-block mb-2">
                                            <b>Destinatário:</b>
                                            {{ get_destinatario_pacote($pacote->destinatario)->nome }}
                                        </small>
                                        <small class="d-block mb-2">
                                            <b>Código de Rastreio:</b>
                                            {{ $pacote->rastreio }}
                                        </small>
                                        <small class="d-block mb-2">
                                            <b>Origem:</b>
                                            {{ get_origem_pacote($pacote->origem) }}
                                        </small>
                                        @isset($pacote->codigo)
                                        <small class="d-block mb-2">
                                            <b>Código de envio:</b>
                                            #{{ $pacote->codigo }}
                                        </small>
                                        @endisset
                                        <small class="d-block mb-2">
                                            <b>Endereço de entrega:</b>
                                            {{ get_endereco_destinatario($pacote->destinatario) }}
                                        </small>
                                        <small class="d-block">
                                            <b>Cep do Destinatário: </b>{{ substr_replace($pacote->regiao, '-', 5, 0) }}
                                        </small>
                                    </div>

                                    @empty($entregadorRecomendado)
                                        <div class="alert alert-danger">
                                            Não foi encontrado um entregador para a região de destino desse pacote.<br>
                                            Por favor, escolha um entregador abaixo.
                                        </div>
                                    @endempty

                                    <div class="col-lg-4 mb-3">
                                        <small class="text-muted">Motoboy que irá fazer a entrega</small>
                                        <select class="form-control" name="id_entregador" form="form-confirmar" required>
                                            <option value="">Escolha o Entregador</option>
                                            @foreach ($todosEntregadores as $entregador)
                                                <option value="{{ $entregador->id }}" @if ($entregadorRecomendado == $entregador->id)
                                                    selected
                                            @endif>
                                            {{ $entregador->nome }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-auto pt-3 text-center">
                                        <form method="post" id="form-confirmar"
                                            action="{{ route('conferente.checkin.confirmar-checkin') }}"
                                            autocomplete="off" class="mx-auto">
                                            @csrf
                                            @method('put')

                                            <button type="submit" class="btn btn-success" name="id"
                                                value="{{ $pacote->id }}">Confirmar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </x-layout>
