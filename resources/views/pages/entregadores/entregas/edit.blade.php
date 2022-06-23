<x-layout menu="entregas" submenu="realizar">
    <div class="header bg-principal bg-height-top"></div>
    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <small class="badge badge-success">
                            Entrega de Pacotes <i class="fas fa-shipping-fast"></i>
                        </small>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}">
                            Voltar
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <p>
                            <b style="font-weight: 600">Destinatário:</b>
                            {{ get_destinatario_pacote($pacote->destinatario)->nome }}
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p>
                            <b style="font-weight: 600">Telefone:</b>
                            {{ get_destinatario_pacote($pacote->destinatario)->telefone }}
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p>
                            <b style="font-weight: 600">CPF/RG:</b>
                            {{ get_destinatario_pacote($pacote->destinatario)->cpf }}
                        </p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <small class="d-block mb-2">
                            <b>Código de Rastreio:</b> {{ $pacote->rastreio }}
                        </small>
                    </div>
                    <div class="col-md-4">
                        <small class="d-block mb-2">
                            <b>Origem:</b>
                            {{ get_origem_pacote($pacote->origem) }}
                        </small>
                    </div>
                    @if ($pacote->codigo)
                        <div class="col-md-4">
                            <small class="d-block mb-2">
                                <b>Código de envio:</b>
                                #{{ $pacote->codigo }}
                            </small>
                        </div>
                    @endif
                </div>
                <div class="row mb-3">
                    <div class="col-12">

                            <b>Endereço:</b> {{ get_endereco($pacote->endereco) }}

                    </div>
                </div>
                <hr class="my-2">
                <form method="POST"
                      action="{{ route('entregadores.entregas.update', $pacote->id) }}"
                      enctype="multipart/form-data">
                    @csrf @method('put')
                    <div class="row mb-3">
                        <div class="col-12">
                            <h3>Quem Recebe?</h3>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="destinatario" name="recebedor" class="custom-control-input"
                                       value="destinatario" checked required>
                                <label class="custom-control-label" for="destinatario">Destinatário</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="vizinho" name="recebedor" class="custom-control-input"
                                       value="vizinho">
                                <label class="custom-control-label" for="vizinho">Vizinho</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="nome_recebedor">Nome</label>
                                <input type="text" name="nome_recebedor" id="nome_recebedor"
                                       class="form-control form-control-alternative" required autofocus>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="documento_recebedor">RG/CPF</label>
                                <input type="text" name="documento_recebedor" id="documento_recebedor"
                                       class="form-control form-control-alternative cpf" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label" for="observacoes">Observações</label>
                                <textarea class="form-control" name="observacoes"></textarea>
                            </div>
                        </div>
                    </div>
{{--                    <div class="form-row">--}}
{{--                        <div class="col-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="form-control-label">Fotos</label>--}}
{{--                                <input type="file" name="imagem" class="form-control">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="form-row justify-content-center">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-success">Finalizar Entrega</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-layout>
