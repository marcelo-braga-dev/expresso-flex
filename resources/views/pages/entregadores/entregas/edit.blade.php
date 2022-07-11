<x-layout menu="entregas" submenu="realizar">
    <div class="header bg-principal bg-height-top"></div>
    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <small class="badge badge-warning">
                            <i class="fas fa-shipping-fast"></i> Entrega de Pacotes
                        </small>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}">
                            Voltar
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body bg-white">
                <div class="row">
                    <div class="col-1 text-right">
                        <i class="fas fa-user text-primary"></i>
                    </div>
                    <div class="col-10 pl-2">
                        {{ get_destinatario_pacote($pacote->destinatario)->nome }}
                    </div>
                </div>
{{--                <div class="row">--}}
{{--                    <div class="col-1">--}}
{{--                        <i class="fas fa-phone text-dark"></i>--}}
{{--                    </div>--}}
{{--                    <div class="col-10 pl-2">--}}
{{--                        {{ get_destinatario_pacote($pacote->destinatario)->telefone ?? '-' }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-1">--}}
{{--                        <i class="fas fa-user-circle text-success"></i>--}}
{{--                    </div>--}}
{{--                    <div class="col-10 pl-2">--}}
{{--                        {{ get_destinatario_pacote($pacote->destinatario)->cpf ?? '-' }}--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="row">
                    <div class="col-1 text-right">
                        <i class="fas fa-qrcode"></i>
                    </div>
                    <div class="col-10 pl-2">
                        {{ get_origem_pacote($pacote->origem) }} -
                        @if (!empty($pacote->codigo))
                            <b> #{{ $pacote->codigo }}</b>
                        @else
                            <b> {{ $pacote->rastreio }}</b>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 text-right">
                        <i class="fas fa-map-marker-alt text-danger"></i>
                    </div>
                    <div class="col-10 pl-2">
                        {{ get_endereco($pacote->endereco) }}
                    </div>
                </div>
                <hr>
                <form method="POST"
                      action="{{ route('entregadores.entregas.update', $pacote->id) }}"
                      enctype="multipart/form-data">
                    @csrf @method('put')
                        <h3 class="d-block">Quem Recebe?</h3>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="residencia" name="recebedor" class="custom-control-input"
                                       value="Residência" required>
                                <label class="custom-control-label" for="residencia">Residência</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="familiar" name="recebedor" class="custom-control-input"
                                       value="Familiar ou Amigo">
                                <label class="custom-control-label" for="familiar">Familiar ou Amigo</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="recepcao" name="recebedor" class="custom-control-input"
                                       value="Recepção/Portaria">
                                <label class="custom-control-label" for="recepcao">Recepção/Portaria</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="vizinho" name="recebedor" class="custom-control-input"
                                       value="Vizinho">
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
