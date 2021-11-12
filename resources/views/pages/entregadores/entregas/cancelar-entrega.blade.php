@extends('layouts.admin', ['title' => 'Entregas'])

@section('content')

    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid pb-8 mt--9 p-1">
        <div class="card card-stats mb-5 border shadow-sm">
            <div class="card-header">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <small class="badge badge-success">Entrega de Pacotes <i class="fas fa-shipping-fast"></i></small>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}">
                            Voltar
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body p-1 p-md-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card p-3">
                            <form method="POST" action="{{ route('entregadores.entrega.atualizar-cancelar-entrega') }}">
                                @csrf @method('put')
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="d-block mb-3">
                                            Motivo do Cancelamento:
                                        </h3>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="destinatario_ausente-{{ $pacote->id }}"
                                                name="motivo_cancelamento" class="custom-control-input"
                                                value="destinatario_ausente" required>
                                            <label class="custom-control-label"
                                                for="destinatario_ausente-{{ $pacote->id }}">Destinatário
                                                Ausente</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="entregador_cancelou-{{ $pacote->id }}"
                                                name="motivo_cancelamento" class="custom-control-input"
                                                value="entregador_cancelou" required>
                                            <label class="custom-control-label"
                                                for="entregador_cancelou-{{ $pacote->id }}">Desistir da
                                                Entrega</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="perda_pacote-{{ $pacote->id }}"
                                                name="motivo_cancelamento" class="custom-control-input"
                                                value="perda_pacote">
                                            <label class="custom-control-label" for="perda_pacote-{{ $pacote->id }}">
                                                Perda do Pacote
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <textarea class="form-control mb-2" name="texto_cancelamento" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12 text-center mb-3">
                                    <input type="hidden" name="id" value="{{ $pacote->id }}">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
