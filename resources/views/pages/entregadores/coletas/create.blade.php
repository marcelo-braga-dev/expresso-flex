<x-layout menu="coletas" submenu="solicitacoes">
    <div class="header bg-principal bg-height-top"></div>
    <div class="container-fluid mt--9 px-1 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <small class="badge badge-info">Coleta de Pacotes <i class="fas fa-dolly"></i></small>
                        <h4 class="card-title text-uppercase mb-0">
                            Criar Solicitações de Coleta
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row px-4">
                    <div class="col">
                        <p>
                            Leia o Qrcode para abrir uma nova solicitação de coleta clicando no botão abaixo:
                        </p>
                    </div>
                </div>
                <div class="row mb-4 px-4 btn-camera" style="display: none">
                    <div class="col-auto mx-auto">
                        <button type="submit" class="btn btn-success link-btn-flutuante-1">Criar Nova Coleta</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-elements.camera-botao-flutuante
        operacao="{{ route('entregadores.qrcode.nova-coleta', ['entregador' => id_usuario_atual()]) }}"
        retorno="{{ route('entregadores.coletas.index') }}"></x-elements.camera-botao-flutuante>

</x-layout>
